<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/29
 * Time: 下午 03:28
 */

namespace Modules\Account\Service;

use Carbon\Carbon;
use Modules\Account\Constants\AccountStatusConstants;
use Modules\Account\Entities\Account;
use Modules\Account\Http\Requests\AccountOtpAuthApplyRequest;
use Modules\Account\Http\Requests\AccountOtpAuthVerifyRequest;
use Modules\Account\Repository\AccountEditRepo;
use Modules\Account\Repository\AccountOtpAuthRepo;
use Modules\Account\Repository\AccountResourceRepo;
use Modules\Base\Constants\ApiCode\Account10000\AccountCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\OtpAuth\Constants\OtpAuthStatusConstants;
use Modules\OtpAuth\Constants\SMSProviderCodeConstants;
use Modules\OtpAuth\Repository\OtpAuthRepo;
use Modules\OtpAuth\Service\SMSProviderFactory;
use Modules\OtpAuth\Util\OtpAuthUtil;
use Modules\Role\Constants\RoleInherentConstants;
use Modules\Role\Repository\RoleResourceRepo;

class AccountOtpAuthService
{
    use Singleton;

    /**
     * 獲取驗證碼
     * @param AccountOtpAuthApplyRequest $handle
     * @return Account|null
     * @throws ApiErrorCodeException
     */
    public function apply(AccountOtpAuthApplyRequest $handle)
    {
        $result = null;
        try {
            $otpCode = OtpAuthUtil::getOtp(6, '0123456789');
            $otpParams = [
                'content'    => $otpCode,
                'expires_at' => Carbon::now()->addMinute()->toDateTimeString()
            ];
            $userParams = [
                'account'      => $handle->getPhone(),
                'password'     => \Hash::make($otpCode),
                'display_name' => $handle->getPhone(),
                'status'       => AccountStatusConstants::ENABLE,
                'phone'        => $handle->getPhone()
            ];
            $message = "【{$handle->getAppName()}】您的验证码是{$otpParams['content']}。如非本人操作，请忽略本短信";
            if (!$this->sendSMS($handle->getPhone(), $message)) {
                throw new ApiErrorCodeException([AccountCodeConstants::SEND_SMS_FAILURE]);
            }
            $account = app(AccountResourceRepo::class)->getMatchAccount($handle->getPhone());
            \DB::transaction(function () use ($userParams, $otpParams, $account, &$result) {
                if (is_null($account)) {
                    $account = app(AccountEditRepo::class)->create($userParams);
                    $rolesId = app(RoleResourceRepo::class)->getRoleByRoleCode([RoleInherentConstants::MEMBER])
                        ->pluck('id')
                        ->toArray();
                    $account->roles()->sync($rolesId);
                }
                $otpAuth = $account->otpAuthOwn()->create($otpParams);
                $result = $account->setRelation('otpAuthOwn', $otpAuth);
            });
        } catch (ApiErrorCodeException $e) {
            throw $e;
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            throw new ApiErrorCodeException([AccountCodeConstants::OTP_AUTH_APPLY_FAIL]);
        }

        return $result;
    }

    /**
     * 驗證驗證碼
     * @param AccountOtpAuthVerifyRequest $handle
     * @return Account|null
     * @throws ApiErrorCodeException
     */
    public function verify(AccountOtpAuthVerifyRequest $handle)
    {
        $result = null;
        try {
            $account = app(AccountOtpAuthRepo::class)->getMatchOtpAuthAccount(
                $handle->getId(),
                $handle->getOtpCode()
            );
            if (!is_null($account)) {
                \DB::transaction(function () use ($account, $handle, &$result) {
                    $update = app(OtpAuthRepo::class)->update(
                        $account,
                        ['otp_auth_status' => OtpAuthStatusConstants::USED]
                    );
                    if (!$update) {
                        throw new ApiErrorCodeException([AccountCodeConstants::OTP_AUTH_FAILURE]);
                    }
                    if (!is_null($handle->getPassword())) {
                        $account->update(['password' => \Hash::make($handle->getPassword())]);
                    }
                    $result = $account;
                });
            }
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            throw new ApiErrorCodeException([AccountCodeConstants::OTP_AUTH_FAILURE]);
        }

        return $result;
    }

    /**
     * @param $phone
     * @param $message
     * @return bool
     * @throws \Modules\Base\Exception\FactoryInstanceErrorException
     */
    private function sendSMS($phone, $message)
    {
        $result = false;
        $response = SMSProviderFactory::make(SMSProviderCodeConstants::AWS_SNS)
            ->send($phone, $message);
        if (!is_null($response)) {
            $result = $response->isSuccess();
        }

        return $result;
    }
}

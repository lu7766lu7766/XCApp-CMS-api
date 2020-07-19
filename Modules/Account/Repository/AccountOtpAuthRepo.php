<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/29
 * Time: 上午 11:55
 */

namespace Modules\Account\Repository;

use Illuminate\Database\Eloquent\Builder;
use Modules\Account\Entities\Account;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\OtpAuth\Constants\OtpAuthStatusConstants;

class AccountOtpAuthRepo
{
    /**
     * @param int $accountId
     * @param string $otpContent
     * @return null|Account
     */
    public function getMatchOtpAuthAccount(int $accountId, string $otpContent)
    {
        $result = null;
        try {
            $result = Account::query()->where('id', $accountId)
                ->whereHas('otpAuthOwn', function (Builder $builder) use ($otpContent) {
                    $builder->where('otp_auth.expires_at', '>=', now()->toDateTimeString())
                        ->where('otp_auth.content', $otpContent)
                        ->where('otp_auth.otp_auth_status', OtpAuthStatusConstants::PENDING);
                })
                ->first();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}

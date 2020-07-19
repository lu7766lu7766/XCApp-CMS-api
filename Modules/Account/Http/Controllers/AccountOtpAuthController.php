<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/29
 * Time: 下午 03:17
 */

namespace Modules\Account\Http\Controllers;

use Modules\Account\Entities\Account;
use Modules\Account\Http\Requests\AccountOtpAuthApplyRequest;
use Modules\Account\Http\Requests\AccountOtpAuthVerifyRequest;
use Modules\Account\Service\AccountOtpAuthService;
use Modules\Base\Constants\ApiCode\Account10000\AccountCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Http\Controllers\BaseController;

class AccountOtpAuthController extends BaseController
{
    /**
     * @return null|Account
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     * @throws \Throwable
     */
    public function apply()
    {
        return AccountOtpAuthService::getInstance()
            ->apply(AccountOtpAuthApplyRequest::getHandle($this->req));
    }

    /**
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function verify()
    {
        $result = null;
        $account = AccountOtpAuthService::getInstance()
            ->verify(AccountOtpAuthVerifyRequest::getHandle($this->req));
        if (is_null($account)) {
            throw new ApiErrorCodeException([AccountCodeConstants::OTP_AUTH_FAILURE]);
        }
        $token = $account->createToken('otp_personal_token');

        return [
            'token' => $token->accessToken
        ];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/26
 * Time: 下午 06:06
 */

namespace Modules\OtpAuth\Repository;

use Modules\Account\Entities\Account;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\OtpAuth\Constants\OtpAuthStatusConstants;
use Modules\OtpAuth\Entities\OtpAuth;

class OtpAuthRepo
{
    /**
     * @return OtpAuth
     */
    public function getModel()
    {
        return new OtpAuth();
    }

    /**
     * @param Account $orm
     * @param array $params
     * @return OtpAuth|null
     */
    public function update(Account $orm, array $params)
    {
        $result = false;
        try {
            $result = $orm->otpAuthOwn()
                ->where('otp_auth_status', OtpAuthStatusConstants::PENDING)
                ->update($params);
            if ($result) {
                $result = true;
            }
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}

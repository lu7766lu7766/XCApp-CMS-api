<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/4/1
 * Time: 上午 10:25
 */

namespace Modules\OtpAuth\Util;

class OtpAuthUtil
{
    /**
     * 產生otp
     * @param int $length
     * @param string $dictionary
     * @return string
     */
    public static function getOtp(int $length = 6, string $dictionary = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456')
    {
        $otp = null;
        for ($i = 0; $i < $length; $i++) {
            $otp .= $dictionary[rand(0, strlen($dictionary) - 1)];
        }

        return str_shuffle($otp);
    }
}

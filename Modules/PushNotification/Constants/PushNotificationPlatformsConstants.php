<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/17
 * Time: 下午 03:14
 */

namespace Modules\PushNotification\Constants;

class PushNotificationPlatformsConstants
{
    const AWS = 'aws';
    const AURORA = 'aurora';
    const XIAO_MI = 'xiaomi';
    const U_MENG = 'umeng';

    /**
     * @return array
     */
    public static function enum()
    {
        return [
            self::AWS,
            self::AURORA,
            self::XIAO_MI,
            self::U_MENG
        ];
    }
}

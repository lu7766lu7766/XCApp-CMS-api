<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/26
 * Time: 下午 04:18
 */

namespace Modules\OtpAuth\Constants;

class OtpAuthStatusConstants
{
    const PENDING = '0'; //待用
    const USED = '1'; //已使用

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::PENDING,
            self::USED
        ];
    }
}

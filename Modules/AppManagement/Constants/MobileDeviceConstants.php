<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/13
 * Time: 下午 02:52
 * 手機裝置
 */

namespace Modules\AppManagement\Constants;

use Modules\Base\Constants\BaseConstants;

class MobileDeviceConstants extends BaseConstants
{
    //ios
    const IOS = 'ios';
    //android
    const ANDROID = 'android';

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::IOS,
            self::ANDROID
        ];
    }
}

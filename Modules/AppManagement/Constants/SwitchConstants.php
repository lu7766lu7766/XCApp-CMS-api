<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/13
 * Time: 下午 03:01
 * 開關
 */

namespace Modules\AppManagement\Constants;

use Modules\Base\Constants\BaseConstants;

class SwitchConstants extends BaseConstants
{
    //開
    const ON = 'on';
    //關
    const OFF = 'off';

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::ON,
            self::OFF
        ];
    }
}

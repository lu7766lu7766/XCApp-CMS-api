<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/19
 * Time: 下午 12:19
 */

namespace Modules\AppManagement\Constants;

use Modules\Base\Constants\BaseConstants;

class PushPathConstants extends BaseConstants
{
    //aws
    const AWS = 'aws';
    //極光
    const AURORA = 'aurora';
    //小米
    const XIAO_MI = 'xiaomi';
    //友盟
    const U_MENG = 'umeng';

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::AWS,
            self::AURORA,
            self::XIAO_MI,
            self::U_MENG,
        ];
    }

    /**
     * for 前端 搜尋列表
     * @return array
     */
    public static function options(): array
    {
        return [
            self::AWS     => 'AWS',
            self::AURORA  => '极光',
            self::XIAO_MI => '小米',
            self::U_MENG  => '友盟'
        ];
    }
}

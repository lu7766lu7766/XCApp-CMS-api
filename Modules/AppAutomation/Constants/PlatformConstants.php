<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/14
 * Time: 下午 12:50
 */

namespace Modules\AppAutomation\Constants;

use Modules\Base\Constants\BaseConstants;

class PlatformConstants extends BaseConstants
{
    const BAIDU = 'baidu'; //百度
    const HUAWEI = 'huawei'; //華為
    const XIAOMI = 'xiaomi'; //小米
    const QIHOO_360 = '360'; //360
    const QQ = 'qq'; //應用寶
    const OPPO = 'oppo'; //oppo

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::BAIDU,
            self::HUAWEI,
            self::XIAOMI,
            self::QIHOO_360,
            self::QQ,
            self::OPPO,
        ];
    }
}

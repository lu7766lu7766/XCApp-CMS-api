<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/6/6
 * Time: 上午 10:56
 */

namespace Modules\IpManagement\Constants;

use Modules\Base\Constants\BaseConstants;

class TypeConstants extends BaseConstants
{
    const BLACKLIST = 'blacklist'; //黑名單
    const WHITELIST = 'whitelist'; //白名單

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::BLACKLIST,
            self::WHITELIST
        ];
    }
}

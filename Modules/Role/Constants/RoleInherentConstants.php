<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/20
 * Time: 下午 04:01
 */

namespace Modules\Role\Constants;

use Modules\Base\Constants\BaseConstants;

class RoleInherentConstants extends BaseConstants
{
    const ADMIN = 'ADMIN';
    //系統管理員
    const SYSTEM_MANAGER = 'SYSTEM_MG';
    //自訂
    const CUSTOM = 'CUSTOM';
    //會員
    const MEMBER = 'MEMBER';

    /**
     * @return array
     */
    public static function internal()
    {
        return [
            self::ADMIN,
            self::SYSTEM_MANAGER,
        ];
    }

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::ADMIN,
            self::SYSTEM_MANAGER,
            self::CUSTOM,
            self::MEMBER
        ];
    }
}

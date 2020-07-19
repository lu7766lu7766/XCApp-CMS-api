<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/26
 * Time: 下午 02:45
 */

namespace Modules\Permission\Constants;

use Modules\Base\Constants\BaseConstants;

/**
 * RESTFul api method permission value.
 * Class MethodPermissionConstants
 * @package Modules\Role\Constants
 */
class PermissionValueConstants extends BaseConstants
{
    const READ = 1;
    const CREATE = 2;
    const UPDATE = 4;
    const DELETE = 8;

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::READ,
            self::CREATE,
            self::UPDATE,
            self::DELETE,
        ];
    }

    /**
     * All permission.
     * @return int
     */
    public static function FULL()
    {
        return self::READ + self::CREATE + self::UPDATE + self::DELETE;
    }
}

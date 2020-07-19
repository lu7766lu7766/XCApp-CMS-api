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
class MethodPermissionConstants extends BaseConstants
{
    const GET = 1;
    const POST = 2;
    const PUT = 4;
    const DELETE = 8;

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::GET,
            self::POST,
            self::PUT,
            self::DELETE,
        ];
    }

    /**
     * All permission.
     * @return int
     */
    public static function FULL()
    {
        return self::GET + self::POST + self::PUT + self::DELETE;
    }

    /**
     * @param string $method
     * @return integer|null
     */
    public static function mappingToValue(string $method)
    {
        return self::methodValueMap()[$method] ?? null;
    }

    /**
     * @return array
     */
    private static function methodValueMap()
    {
        return [
            'GET'    => self::GET,
            'POST'   => self::POST,
            'PUT'    => self::PUT,
            'DELETE' => self::DELETE,
        ];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 05:17
 */

namespace Modules\Base\Support;

class JsonMaster
{
    public static function isJson(string $json)
    {
        json_decode($json);

        return (json_last_error() == JSON_ERROR_NONE);
    }
}

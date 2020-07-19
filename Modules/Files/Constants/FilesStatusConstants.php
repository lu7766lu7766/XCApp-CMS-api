<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/27
 * Time: 下午 02:11
 */

namespace Modules\Files\Constants;

class FilesStatusConstants
{
    const OFF = 'off';
    const ON = 'on';

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::OFF,
            self::ON,
        ];
    }
}

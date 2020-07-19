<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/9
 * Time: 上午 11:48
 */

namespace Modules\Base\Constants;

class CommonStatusConstants extends BaseConstants
{
    const ENABLE = 'enable';
    const DISABLE = 'disable';

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::ENABLE,
            self::DISABLE
        ];
    }
}

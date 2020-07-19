<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/7
 * Time: 下午 04:49
 */

namespace Modules\MorphCounter\Constants;

use Modules\Base\Constants\BaseConstants;

class MorphCounterConstants extends BaseConstants
{
    //讚
    const THUMBS_UP = 1;

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::THUMBS_UP
        ];
    }
}

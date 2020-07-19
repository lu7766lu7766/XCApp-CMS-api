<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/14
 * Time: 下午 02:09
 */

namespace Modules\AppManagement\Constants;

use Modules\Base\Constants\BaseConstants;

class CategoryConstants extends BaseConstants
{
    //彩票
    const LOTTERY = 'lottery';
    //期貨
    const FUTURES = 'futures';
    //體育
    const SPORTS = 'sports';

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::LOTTERY,
            self::FUTURES,
            self::SPORTS,
        ];
    }
}

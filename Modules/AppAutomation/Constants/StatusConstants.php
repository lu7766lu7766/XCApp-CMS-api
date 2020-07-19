<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/14
 * Time: 下午 12:44
 */

namespace Modules\AppAutomation\Constants;

use Modules\Base\Constants\BaseConstants;

class StatusConstants extends BaseConstants
{
    const PENDING = 'pending';  //待處理
    const DOING = 'doing'; //打包中
    const COMPLETE = 'complete'; //打包完成

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::PENDING,
            self::DOING,
            self::COMPLETE
        ];
    }
}

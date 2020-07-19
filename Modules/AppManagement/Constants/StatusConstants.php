<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/14
 * Time: 上午 11:11
 */

namespace Modules\AppManagement\Constants;

use Modules\Base\Constants\BaseConstants;

class StatusConstants extends BaseConstants
{
    //未上架
    const UNPUBLISHED = 'unpublished';
    //審核中
    const VERIFYING = 'verifying';
    //已上架
    const PUBLISHED = 'published';
    //已下架
    const REMOVED = 'removed';

    /**
     * @return array
     */
    public static function enum(): array
    {
        return [
            self::UNPUBLISHED,
            self::VERIFYING,
            self::PUBLISHED,
            self::REMOVED
        ];
    }
}

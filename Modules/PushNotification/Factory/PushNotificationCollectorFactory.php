<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/17
 * Time: 下午 04:11
 */

namespace Modules\PushNotification\Factory;

use Modules\Base\Support\Traits\Pattern\Factory;
use Modules\PushNotification\Adapter\AuroraAdapter;
use Modules\PushNotification\Adapter\AWSAdapter;
use Modules\PushNotification\Adapter\UmengAdapter;
use Modules\PushNotification\Adapter\XiaoMiAdapter;
use Modules\PushNotification\Constants\PushNotificationPlatformsConstants;

class PushNotificationCollectorFactory
{
    use Factory;

    /**
     * @return array
     */
    public static function map(): array
    {
        return [
            PushNotificationPlatformsConstants::AWS     => AWSAdapter::class,
            PushNotificationPlatformsConstants::AURORA  => AuroraAdapter::class,
            PushNotificationPlatformsConstants::XIAO_MI => XiaoMiAdapter::class,
            PushNotificationPlatformsConstants::U_MENG  => UmengAdapter::class
        ];
    }
}

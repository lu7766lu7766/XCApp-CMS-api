<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/28
 * Time: 下午 03:40
 */

namespace Modules\AppAutomation\Factory\Requests\Notify;

use App\Contract\Laravel\Validation\IDescription;
use Modules\AppAutomation\Rules\Notify\AuroraRules;
use Modules\AppAutomation\Rules\Notify\AWSRules;
use Modules\AppAutomation\Rules\Notify\XiaoMiRules;
use Modules\Base\Support\Traits\Pattern\Factory;
use Modules\PushNotification\Constants\PushNotificationPlatformsConstants;

/**
 * Class RulesFactory
 * @package Modules\AppAutomation\Factory\Requests\Notify
 * @method static IDescription make(string $key, array $parameters = [])
 */
class RulesFactory
{
    use Factory;

    /**
     * @return array
     */
    public static function map(): array
    {
        return [
            PushNotificationPlatformsConstants::AWS     => AWSRules::class,
            PushNotificationPlatformsConstants::AURORA  => AuroraRules::class,
            PushNotificationPlatformsConstants::XIAO_MI => XiaoMiRules::class
        ];
    }
}

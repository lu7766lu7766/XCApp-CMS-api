<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/6/4
 * Time: 下午 04:53
 */

namespace Modules\AppManagement\Factory\PushPath;

use Modules\AppManagement\Constants\PushPathConstants;
use Modules\AppManagement\Contract\IValidator;
use Modules\AppManagement\Pusher\Aurora;
use Modules\AppManagement\Pusher\Aws;
use Modules\AppManagement\Pusher\UMeng;
use Modules\AppManagement\Pusher\XiaoMi;
use Modules\Base\Support\Traits\Pattern\Factory;

/**
 * Class ConfigRulesFactory
 * @package Modules\AppManagement\Pusher
 * @method static IValidator make(string $key, array $parameters = [])
 */
class ConfigValidatorFactory
{
    use Factory;

    /**
     * @return array
     */
    public static function map(): array
    {
        return [
            PushPathConstants::AWS     => Aws::class,
            PushPathConstants::AURORA  => Aurora::class,
            PushPathConstants::XIAO_MI => XiaoMi::class,
            PushPathConstants::U_MENG  => UMeng::class
        ];
    }
}

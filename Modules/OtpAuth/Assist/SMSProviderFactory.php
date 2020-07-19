<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/4/8
 * Time: 下午 03:44
 */

namespace Modules\OtpAuth\Service;

use App\Contract\ISMS;
use App\SNS\AmazonSNS;
use Modules\Base\Support\Traits\Pattern\Factory;
use Modules\OtpAuth\Constants\SMSProviderCodeConstants;

/**
 * Class SMSProviderFactory
 * @package Modules\OtpAuth\Service
 * @method static ISMS make(string $key, array $parameters = [])
 */
class SMSProviderFactory
{
    use Factory;

    /**
     * @return array
     */
    public static function map(): array
    {
        return [
            SMSProviderCodeConstants::AWS_SNS => AmazonSNS::class
        ];
    }
}

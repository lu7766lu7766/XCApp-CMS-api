<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/4/8
 * Time: 下午 03:52
 */

namespace App\SNS;

use App\Contract\ISMS;
use App\Contract\ISMSResponse;
use Xc\AwsSns\Services\SNSService;

class AmazonSNS implements ISMS
{
    /**@var SNSService $service */
    private $service;

    /**
     * SNSService constructor.
     * @param SNSService $service
     */
    public function __construct(SNSService $service = null)
    {
        $this->service = is_null($service) ? app(SNSService::class) : $service;
    }

    /**
     * @param string $phone
     * @param string $message
     * @return ISMSResponse
     */
    public function send(string $phone, string $message)
    {
        return new AmazonSNSResponse(
            $this->service->sendSmsByPhoneNumber($phone, $message)
        );
    }
}

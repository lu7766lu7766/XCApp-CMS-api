<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/17
 * Time: 下午 04:08
 */

namespace Modules\PushNotification\Adapter;

use JPush\Client;
use JPush\Exceptions\JPushException;
use Modules\PushNotification\Constants\PushNotificationPlatformsConstants;
use Modules\PushNotification\Contract\INotificationApiResponse;
use Modules\PushNotification\Contract\INotificationService;
use Modules\PushNotification\Endpoint\Response\AuroraResponse;
use Modules\PushNotification\Endpoint\Response\SummaryResponse;

class AuroraAdapter implements INotificationService
{
    /** @var Client|null $client */
    private $client = null;

    public function __construct(string $key = null, string $secret = null)
    {
        if (!is_null($key) && !is_null($secret)) {
            $this->client = new Client($key, $secret, null);
        }
    }

    /**
     * @param string $message
     * @return INotificationApiResponse
     */
    public function publish(string $message): INotificationApiResponse
    {
        try {
            if (!is_null($this->client)) {
                $pusher = $this->client->push();
                $result = $pusher->setPlatform('all')
                    ->addAllAudience()
                    ->setNotificationAlert($message)
                    ->send();
                $response = new AuroraResponse($result);
            } else {
                $response = new SummaryResponse(
                    PushNotificationPlatformsConstants::AURORA,
                    'Invalid appKey or masterSecret  key: null  secret: null'
                );
                $response->setSuccess(false);
            }
        } catch (JPushException $e) {
            $response = new SummaryResponse(
                PushNotificationPlatformsConstants::AURORA,
                $e->getMessage()
            );
            $response->setSuccess(false)->setStatusCode(500)->setErrorCode($e->getCode());
        }

        return $response;
    }
}

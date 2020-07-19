<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/3/21
 * Time: 下午 05:47
 */

namespace Modules\PushNotification\Adapter;

use Modules\Base\Support\Scalar\StringMaster;
use Modules\PushNotification\Contract\INotificationApiResponse;
use Modules\PushNotification\Contract\INotificationService;
use Modules\PushNotification\Endpoint\Response\XiaoMiResponse;
use XiaoMiPush\Service\AndroidClient;

class XiaoMiAdapter implements INotificationService
{
    /** @var AndroidClient $client */
    private $client;
    /** @var string $title */
    private $title;

    /**
     * XiaoMiAdapter constructor.
     * @param string $appSecret
     * @param string $packageName
     * @param string $title
     */
    public function __construct(string $appSecret, string $packageName, string $title)
    {
        $this->client = new AndroidClient($appSecret, [$packageName]);
        $this->title = $title;
    }

    /**
     * @param string $message
     * @return INotificationApiResponse
     */
    public function publish(string $message): INotificationApiResponse
    {
        $description = (StringMaster::length($message) > 10) ?
            (StringMaster::substr($message, 0, 10) . "...") :
            $message;
        $title = (StringMaster::length($this->title) > 10) ?
            StringMaster::substr($this->title, 0, 10) :
            $this->title;
        $response = $this->client->allPush($message, $title, $description);

        return new XiaoMiResponse($response);
    }
}

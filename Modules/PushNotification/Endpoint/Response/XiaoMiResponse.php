<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/3/21
 * Time: 下午 06:20
 */

namespace Modules\PushNotification\Endpoint\Response;

use Modules\PushNotification\Constants\PushNotificationPlatformsConstants;
use Modules\PushNotification\Contract\INotificationApiResponse;
use XiaoMiPush\Response\PushResponse;

class XiaoMiResponse implements INotificationApiResponse
{
    /** @var PushResponse $response */
    private $response;

    /**
     * XiaoMiNotificationApiResponse constructor.
     * @param PushResponse $response
     */
    public function __construct(PushResponse $response)
    {
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function getPusher()
    {
        return PushNotificationPlatformsConstants::XIAO_MI;
    }

    /**
     * @return string|null
     */
    public function getErrorMsg()
    {
        return $this->response->getFailReason();
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->response->isConnectSuccess() && !$this->response->isErrorOccur();
    }

    /**
     * @return string|null
     */
    public function getIdentifier()
    {
        return $this->response->getId();
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->response->getHttpResponse()->statusCode();
    }

    /**
     * @return int|null
     */
    public function getErrorCode()
    {
        return $this->response->getCode();
    }
}

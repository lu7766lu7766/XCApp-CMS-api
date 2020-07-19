<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/22
 * Time: 下午 05:50
 */

namespace Modules\PushNotification\Endpoint\Response;

use Modules\PushNotification\Constants\PushNotificationPlatformsConstants;
use Modules\PushNotification\Contract\INotificationApiResponse;

class AuroraResponse implements INotificationApiResponse
{
    /**
     * @var array
     */
    private $result;

    /**
     * AuroraNotificationApiResponse constructor.
     * @param array $result
     */
    public function __construct(array $result)
    {
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getPusher()
    {
        return PushNotificationPlatformsConstants::AURORA;
    }

    /**
     * @return null
     */
    public function getErrorMsg()
    {
        return null;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return true;
    }

    /**
     * @return int|string
     */
    public function getIdentifier()
    {
        return $this->result['body']['msg_id'];
    }

    /**
     * @return int|string
     */
    public function getStatusCode()
    {
        return $this->result['headers'][0];
    }

    /**
     * @return null
     */
    public function getErrorCode()
    {
        return null;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/23
 * Time: 下午 06:03
 */

namespace Modules\PushNotification\Endpoint\Response;

use Modules\PushNotification\Constants\PushNotificationPlatformsConstants;
use Modules\PushNotification\Contract\INotificationApiResponse;

class AwsResponse implements INotificationApiResponse
{
    /**
     * @var \Aws\Result
     */
    private $result;

    /**
     * AwsNotificationApiResponse constructor.
     * @param \Aws\Result $result
     */
    public function __construct(\Aws\Result $result)
    {
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getPusher()
    {
        return PushNotificationPlatformsConstants::AWS;
    }

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
     * @return string
     */
    public function getIdentifier()
    {
        return $this->result->toArray()['MessageId'];
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->result->toArray()['@metadata']['statusCode'];
    }

    /**
     * @return null
     */
    public function getErrorCode()
    {
        return null;
    }
}

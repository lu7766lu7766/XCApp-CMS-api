<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/23
 * Time: 下午 03:33
 */

namespace Modules\PushNotification\Endpoint\Response;

use Modules\PushNotification\Contract\INotificationApiResponse;

class SummaryResponse implements INotificationApiResponse
{
    /**
     * @var null|string
     */
    private $errorMsg;
    /**
     * @var string
     */
    private $pusher;
    /**
     * @var string|int|null
     */
    private $identifier;
    /**
     * @var bool
     */
    private $success = false;
    /**
     * @var string|int|null
     */
    private $statusCode = null;
    /**
     * @var string|int|null
     */
    private $errorCode;

    /**
     * AwsNotificationApiResponse constructor.
     * @param string $pusher
     * @param string|null $errorMsg
     */
    public function __construct(string $pusher, string $errorMsg = null)
    {
        $this->pusher = $pusher;
        $this->errorMsg = $errorMsg;
    }

    /**
     * @return string|null
     */
    public function getErrorMsg()
    {
        return $this->errorMsg;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->success;
    }

    /**
     * @return string
     */
    public function getPusher()
    {
        return $this->pusher;
    }

    /**
     * @return int|string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param int|string|null $identifier
     * @return SummaryResponse
     */
    public function setIdentifier($identifier): SummaryResponse
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @param bool $success
     * @return SummaryResponse
     */
    public function setSuccess(bool $success): SummaryResponse
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @param int|string|null $code
     * @return SummaryResponse
     */
    public function setStatusCode($code): SummaryResponse
    {
        $this->statusCode = $code;

        return $this;
    }

    /**
     * @return int|string|null
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return int|string|null
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @param int|null|string $errorCode
     * @return SummaryResponse
     */
    public function setErrorCode($errorCode): SummaryResponse
    {
        $this->errorCode = $errorCode;

        return $this;
    }
}

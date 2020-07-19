<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/6/4
 * Time: 下午 06:25
 */

namespace Modules\PushNotification\Endpoint\Response;

use Modules\PushNotification\Constants\PushNotificationPlatformsConstants;
use Modules\PushNotification\Contract\INotificationApiResponse;
use Symfony\Component\Process\Process;

class UmengResponse implements INotificationApiResponse
{
    /** @var Process $response */
    private $response;

    /**
     * UmengResponse constructor.
     * @param Process $process
     */
    public function __construct(Process $process)
    {
        $this->response = $process;
    }

    /**
     * @return string
     */
    public function getPusher()
    {
        return PushNotificationPlatformsConstants::U_MENG;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->response->isSuccessful();
    }

    /**
     * @return string
     */
    public function getIdentifier()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return 200;
    }

    /**
     * @return string
     */
    public function getErrorCode()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getErrorMsg()
    {
        return $this->response->getErrorOutput();
    }
}

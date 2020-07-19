<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/23
 * Time: 下午 01:45
 */

namespace Modules\PushNotification\Contract;

interface INotificationApiResponse
{
    /**
     * @return string
     */
    public function getPusher();

    /**
     * @return bool
     */
    public function isSuccess();

    /**
     * @return string
     */
    public function getIdentifier();

    /**
     * @return string
     */
    public function getStatusCode();

    /**
     * @return string
     */
    public function getErrorCode();

    /**
     * @return string
     */
    public function getErrorMsg();
}

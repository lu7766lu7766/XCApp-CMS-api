<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/17
 * Time: 下午 03:56
 */

namespace Modules\PushNotification\Contract;

/**
 * Interface INotificationService, prepare push emit for use.
 * @package Modules\PushNotification\Contract
 */
interface INotificationService
{
    /**
     * @param string $message
     * @return INotificationApiResponse
     */
    public function publish(string $message): INotificationApiResponse;
}

<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/19
 * Time: 下午 01:43
 */

namespace Modules\PushNotification\Repository;

use Modules\PushNotification\Entities\PushNotificationAppManagement;

class PushNotificationAppManagementRep
{
    /**
     * @return PushNotificationAppManagement
     */
    private function getModel()
    {
        return new PushNotificationAppManagement();
    }

    /**
     * @param array $ids
     * @return int
     */
    public function forceDeletePushNotification(array $ids)
    {
        return $this->getModel()->whereIn('push_notification_id', $ids)->delete();
    }
}

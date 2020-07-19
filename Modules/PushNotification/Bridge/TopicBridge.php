<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/26
 * Time: 下午 02:22
 */

namespace Modules\PushNotification\Bridge;

use Illuminate\Support\Collection;
use Modules\AppManagement\Repository\AppManagementRepo;

class TopicBridge
{
    /**
     * @property AppManagementRepo $appManagementRepo
     */
    private $appManagementRepo;

    public function __construct(AppManagementRepo $appManagementRepo = null)
    {
        if (is_null($this->appManagementRepo = $appManagementRepo)) {
            $this->appManagementRepo = \App::make(AppManagementRepo::class);
        }
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->appManagementRepo->getAllTopic() ?? new Collection();
    }
}

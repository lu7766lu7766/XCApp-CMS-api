<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/26
 * Time: 下午 06:42
 */

namespace Modules\PushNotification\Service;

use Modules\PushNotification\Bridge\TopicBridge;

class TopicService
{
    /** @var TopicBridge $bridge */
    private $bridge;

    /**
     * TopicService constructor.
     * @param TopicBridge $bridge
     */
    public function __construct(TopicBridge $bridge)
    {
        $this->bridge = $bridge;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->bridge->all();
    }
}

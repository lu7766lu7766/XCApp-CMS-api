<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/4
 * Time: 下午 01:07
 */

namespace Modules\News\Service;

use Modules\News\Contract\ITopic;

class TopicService
{
    /**
     * @var ITopic
     */
    private $bridge;

    /**
     * TopicService constructor.
     * @param ITopic $bridge
     */
    public function __construct(ITopic $bridge)
    {
        $this->bridge = $bridge;
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->bridge->all()->toArray();
    }
}

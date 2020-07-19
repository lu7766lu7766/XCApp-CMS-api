<?php

namespace Modules\PushNotification\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\PushNotification\Service\TopicService;

class TopicController extends BaseController
{
    /**
     * @var TopicService
     */
    private $service;

    /**
     * TopicController constructor.
     * @param TopicService $service
     */
    public function __construct(TopicService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->service->all();
    }
}

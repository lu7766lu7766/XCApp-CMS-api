<?php

namespace Modules\News\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\News\Service\TopicService;

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
     * @return array
     */
    public function list()
    {
        return $this->service->all();
    }
}

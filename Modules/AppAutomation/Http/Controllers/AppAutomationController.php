<?php

namespace Modules\AppAutomation\Http\Controllers;

use Modules\AppAutomation\Entities\AppAutomation;
use Modules\AppAutomation\Http\Requests\AppAutomationAddRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationCallbackRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationDelRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationDetailRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationListRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationPackageRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationUpdateRequest;
use Modules\AppAutomation\Http\Requests\AppAutomationUploadRequest;
use Modules\AppAutomation\Service\AppAutomationService;
use Modules\Base\Http\Controllers\BaseController;

class AppAutomationController extends BaseController
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Modules\AppAutomation\Entities\AppAutomation[]
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function list()
    {
        return AppAutomationService::getInstance()->list(AppAutomationListRequest::getHandle($this->req));
    }

    /**
     * @return int
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function total()
    {
        return AppAutomationService::getInstance()->total(AppAutomationListRequest::getHandle($this->req));
    }

    /**
     * @return \Modules\AppAutomation\Entities\AppAutomation|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function detail()
    {
        return AppAutomationService::getInstance()->detail(AppAutomationDetailRequest::getHandle($this->req));
    }

    /**
     * @return AppAutomation|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function add()
    {
        return AppAutomationService::getInstance()->add(AppAutomationAddRequest::getHandle($this->req));
    }

    /**
     * @return AppAutomation|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function update()
    {
        return AppAutomationService::getInstance()->update(AppAutomationUpdateRequest::getHandle($this->req));
    }

    /**
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function del()
    {
        return AppAutomationService::getInstance()->del(AppAutomationDelRequest::getHandle($this->req));
    }

    /**
     * @return \Modules\Files\Entities\Files|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function upload()
    {
        return AppAutomationService::getInstance()->upload(AppAutomationUploadRequest::getHandle($this->req));
    }

    /**
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function package()
    {
        return [
            'result' => AppAutomationService::getInstance()->package(AppAutomationPackageRequest::getHandle($this->req))
        ];
    }

    /**
     * @return AppAutomation|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function callback()
    {
        return AppAutomationService::getInstance()->callback(AppAutomationCallbackRequest::getHandle($this->req));
    }
}

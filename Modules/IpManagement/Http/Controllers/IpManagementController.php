<?php

namespace Modules\IpManagement\Http\Controllers;

use Illuminate\Support\Collection;
use Modules\Base\Http\Controllers\BaseController;
use Modules\IpManagement\Entities\IpManagement;
use Modules\IpManagement\Http\Requests\IpManagementAddRequest;
use Modules\IpManagement\Http\Requests\IpManagementDataRequest;
use Modules\IpManagement\Http\Requests\IpManagementDelRequest;
use Modules\IpManagement\Http\Requests\IpManagementDetailRequest;
use Modules\IpManagement\Http\Requests\IpManagementListRequest;
use Modules\IpManagement\Http\Requests\IpManagementTotalRequest;
use Modules\IpManagement\Http\Requests\IpManagementUpdateRequest;
use Modules\IpManagement\Service\IpManagementService;

class IpManagementController extends BaseController
{
    /**
     * @return Collection|IpManagement[]
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function list()
    {
        return IpManagementService::getInstance()->list(IpManagementListRequest::getHandle($this->req));
    }

    /**
     * @return int
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function total()
    {
        return IpManagementService::getInstance()->total(IpManagementTotalRequest::getHandle($this->req));
    }

    /**
     * @return IpManagement|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function detail()
    {
        return IpManagementService::getInstance()->detail(IpManagementDetailRequest::getHandle($this->req));
    }

    /**
     * @return IpManagement
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function add()
    {
        return IpManagementService::getInstance()->add(IpManagementAddRequest::getHandle($this->req));
    }

    /**
     * @return IpManagement
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function update()
    {
        return IpManagementService::getInstance()->update(IpManagementUpdateRequest::getHandle($this->req));
    }

    /**
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function del()
    {
        return [
            'result' => IpManagementService::getInstance()->del(IpManagementDelRequest::getHandle($this->req))
        ];
    }

    /**
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function data()
    {
        return IpManagementService::getInstance()->data(IpManagementDataRequest::getHandle($this->req));
    }
}

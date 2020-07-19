<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Account\Service\AccountEditService;
use Modules\Base\Http\Controllers\BaseController;

class AccountController extends BaseController
{
    /**
     * Account info.
     * @param Request $request
     * @return array
     */
    public function info(Request $request)
    {
        return $request->user();
    }

    /**
     * Account list.
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function showList()
    {
        $service = AccountEditService::getInstance($this->getReq());
        $result = $service->showList(request()->user()->id);

        return array_merge(
            $result,
            [
                'role_menu'   => $service->usableRoleList(request()->user()->id),
                'status_menu' => $service->usableAccountStatus()
            ]
        );
    }

    /**
     * Account list total number
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function showListTotal()
    {
        $service = AccountEditService::getInstance($this->getReq());

        return $service->showListTotal(request()->user()->id);
    }

    /**
     * Show the form for creating a new resource.
     * @return mixed
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     * @throws \Throwable
     */
    public function create()
    {
        $service = AccountEditService::getInstance($this->getReq());
        $result = $service->create(request()->user()->id);

        return $result->toArray();
    }

    /**
     * Update the specified resource in storage.
     * @return mixed
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     * @throws \Throwable
     */
    public function update()
    {
        $service = AccountEditService::getInstance($this->getReq());

        return $service->update(request()->user()->id);
    }

    /**
     * Delete the account by modifying the status value
     * @return array
     */
    /**
     * Delete the account by modifying the status value
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function softDelete()
    {
        $service = AccountEditService::getInstance($this->getReq());
        $service->softDelete(request()->user()->id);

        return ['result' => true];
    }

    /**
     * Show the account information of login user
     * @return array
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function showSelf()
    {
        $service = AccountEditService::getInstance($this->getReq());
        $result = $service->showSelf(request()->user()->id);

        return array_merge(
            $result,
            [
                'status_menu' => $service->usableAccountStatus()
            ]
        );
    }

    /**
     * Update login user information
     * @return null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     * @throws \Throwable
     */
    public function updateSelf()
    {
        $service = AccountEditService::getInstance($this->getReq());

        return $service->updateSelf(request()->user()->id);
    }
}

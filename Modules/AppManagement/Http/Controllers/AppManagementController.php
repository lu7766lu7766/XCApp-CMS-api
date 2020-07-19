<?php

namespace Modules\AppManagement\Http\Controllers;

use Modules\AppManagement\Entities\AppManagementORM;
use Modules\AppManagement\Http\Requests\AppManagementDeleteRequest;
use Modules\AppManagement\Http\Requests\AppManagementListRequest;
use Modules\AppManagement\Http\Requests\AppManagementStoreRequest;
use Modules\AppManagement\Http\Requests\AppManagementUpdateRequest;
use Modules\AppManagement\Service\AppManagementService;
use Modules\Base\Http\Controllers\BaseController;

class AppManagementController extends BaseController
{
    /**
     * 取得APP列表
     * @param AppManagementListRequest $request
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function list(AppManagementListRequest $request)
    {
        return AppManagementService::getInstance()->list($request);
    }

    /**
     * 新增APP資訊
     * @param AppManagementStoreRequest $request
     * @return AppManagementORM
     * @throws \Throwable
     */
    public function store(AppManagementStoreRequest $request)
    {
        return AppManagementService::getInstance()->store($request);
    }

    /**
     * 編輯APP資訊
     * @param AppManagementUpdateRequest $request
     * @return AppManagementORM
     * @throws \Throwable
     */
    public function update(AppManagementUpdateRequest $request)
    {
        return AppManagementService::getInstance()->update($request);
    }

    /**
     * 刪除APP資訊
     * @param AppManagementDeleteRequest $request
     * @return AppManagementORM
     * @throws \Throwable
     */
    public function delete(AppManagementDeleteRequest $request)
    {
        return AppManagementService::getInstance()->delete($request);
    }

    /**
     * 取得總筆數
     * @param AppManagementListRequest $request
     * @return int
     */
    public function total(AppManagementListRequest $request)
    {
        return AppManagementService::getInstance()->total($request);
    }

    /**
     * 取得搜尋選項
     * @return array
     */
    public function options()
    {
        return AppManagementService::getInstance()->options();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/11
 * Time: 下午 04:50
 */

namespace Modules\AppManagement\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\AppManagement\Http\Requests\AppManagementDeleteRequest;
use Modules\AppManagement\Http\Requests\AppManagementDeviceStoreRequest;
use Modules\AppManagement\Http\Requests\AppManagementListRequest;
use Modules\AppManagement\Http\Requests\AppManagementStoreRequest;
use Modules\AppManagement\Http\Requests\AppManagementUpdateRequest;
use Modules\AppManagement\Service\PersonalService;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Http\Controllers\BaseController;

class PersonalController extends BaseController
{
    /**
     * 取得APP列表
     * @param AppManagementListRequest $request
     * @param AuthManager $auth
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function list(AppManagementListRequest $request, AuthManager $auth)
    {
        return PersonalService::getInstance($auth->guard()->user())->list($request);
    }

    /**
     * 新增APP資訊
     * @param AppManagementStoreRequest $request
     * @param AuthManager $auth
     * @return AppManagementORM
     * @throws \Throwable
     */
    public function store(AppManagementStoreRequest $request, AuthManager $auth)
    {
        return PersonalService::getInstance($auth->guard()->user())->store($request);
    }

    /**
     * 編輯APP資訊
     * @param AppManagementUpdateRequest $request
     * @param AuthManager $auth
     * @return AppManagementORM
     * @throws \Throwable
     */
    public function update(AppManagementUpdateRequest $request, AuthManager $auth)
    {
        return PersonalService::getInstance($auth->guard()->user())->update($request);
    }

    /**
     * 刪除APP資訊
     * @param AppManagementDeleteRequest $request
     * @param AuthManager $auth
     * @return AppManagementORM
     * @throws \Throwable
     */
    public function delete(AppManagementDeleteRequest $request, AuthManager $auth)
    {
        return PersonalService::getInstance($auth->guard()->user())->delete($request);
    }

    /**
     * 取得總筆數
     * @param AppManagementListRequest $request
     * @param AuthManager $auth
     * @return int
     */
    public function total(AppManagementListRequest $request, AuthManager $auth)
    {
        return PersonalService::getInstance($auth->guard()->user())->total($request);
    }

    /**
     * 新增app底下裝置資訊
     * @param AppManagementDeviceStoreRequest $request
     * @param AuthManager $auth
     * @return AppManagementORM
     * @throws ApiErrorCodeException
     */
    public function deviceStore(AppManagementDeviceStoreRequest $request, AuthManager $auth)
    {
        return PersonalService::getInstance($auth->guard()->user())->deviceStore($request);
    }
}

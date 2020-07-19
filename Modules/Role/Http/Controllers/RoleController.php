<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Role\Http\Requests\RoleIndexRequest;
use Modules\Role\Scope\RoleScope;
use Modules\Role\Service\RoleBrowserService;

class RoleController extends BaseController
{
    /**
     * 角色列表
     * @param RoleIndexRequest $request
     * @param AuthManager $auth
     * @return array
     */
    public function index(RoleIndexRequest $request, AuthManager $auth)
    {
        return RoleBrowserService::getInstance($auth->guard()->user(), RoleScope::getInstance())->getList($request);
    }

    /**
     * @param AuthManager $auth
     * @return int
     */
    public function total(AuthManager $auth)
    {
        return RoleBrowserService::getInstance($auth->guard()->user(), RoleScope::getInstance())->total();
    }
}

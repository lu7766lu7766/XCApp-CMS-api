<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Role\Entities\Role;
use Modules\Role\Http\Requests\RoleDeleteRequest;
use Modules\Role\Http\Requests\RoleEditRequest;
use Modules\Role\Http\Requests\RoleInfoRequest;
use Modules\Role\Scope\RoleScope;
use Modules\Role\Service\RoleEditService;

class RoleMaintainController extends BaseController
{
    /**
     * @param AuthManager $auth
     * @param mixed $id 理想是 int
     * @return Role|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function info(AuthManager $auth, $id)
    {
        $request = RoleInfoRequest::getHandle(compact('id'));

        return RoleEditService::getInstance($auth->guard()->user(), RoleScope::getInstance())->find($request);
    }

    /**
     * @param RoleEditRequest $request
     * @param AuthManager $auth
     * @return Role|null
     */
    public function edit(RoleEditRequest $request, AuthManager $auth)
    {
        return RoleEditService::getInstance($auth->guard()->user(), RoleScope::getInstance())->editCustomRole($request);
    }

    /**
     * @param $id
     * @param AuthManager $auth
     * @return int
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function delete($id, AuthManager $auth)
    {
        $request = RoleDeleteRequest::getHandle(compact('id'));

        return RoleEditService::getInstance($auth->guard()->user(), RoleScope::getInstance())
            ->deleteCustomRole($request);
    }
}

<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Role\Http\Requests\GetTargetNodeMapRequest;
use Modules\Role\Http\Requests\RoleNodeConfigureRequest;
use Modules\Role\Scope\RoleScope;
use Modules\Role\Service\RoleNodeService;

class RoleNodeController extends BaseController
{
    /**
     * @param RoleNodeConfigureRequest $request
     * @param AuthManager $auth
     * @return array
     */
    public function bind(RoleNodeConfigureRequest $request, AuthManager $auth)
    {
        $service = RoleNodeService::getInstance($auth->guard()->user(), RoleScope::getInstance());

        return $service->deploy($request);
    }

    /**
     * @param GetTargetNodeMapRequest $request
     * @param AuthManager $auth
     * @return array
     */
    public function map(GetTargetNodeMapRequest $request, AuthManager $auth)
    {
        $service = RoleNodeService::getInstance($auth->guard()->user(), RoleScope::getInstance());

        return $service->map($request);
    }
}

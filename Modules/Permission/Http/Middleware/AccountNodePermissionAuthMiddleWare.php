<?php

namespace Modules\Permission\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Base\Constants\ApiCode\Permission20000\PermissionCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Permission\Repository\AccountNodePermissionRepo;
use Nwidart\Modules\Module;

class AccountNodePermissionAuthMiddleWare
{
    /**
     * Handle an incoming request ,check user can access the uri.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     * @throws ApiErrorCodeException
     */
    public function handle(Request $request, Closure $next)
    {
        $methodPermission = $this->getPermission($request);
        $action = $this->getAction($request);
        $account = app(AccountNodePermissionRepo::class)->findAccountWithPermission(
            collect($request->user())->get('id'),
            $action,
            $methodPermission
        );
        if (is_null($account)) {
            throw new ApiErrorCodeException(
                [PermissionCodeConstants::NO_HAVE_THE_PERMISSION],
                'NO_HAVE_THE_PERMISSION'
            );
        }

        return $next($request);
    }

    /**
     * Resolve permission transform.
     * @param Request $request
     * @return int
     */
    public function getPermission(Request $request)
    {
        $result = MethodPermissionConstants::mappingToValue($request->getMethod());
        try {
            $route = $request->route();
            /** @var BaseController $controller */
            $controller = $route->getController();
            /** @var Module $module */
            $module = \Module::find($controller->moduleName());
            $result = config(
                $module->getName() . '.config.route.' . $route->getName() . '.permission',
                $result
            );
        } catch (\Throwable $e) {
        }

        return $result;
    }

    /**
     * Resolve node uri transform.
     * @param Request $request
     * @return string
     */
    public function getAction(Request $request)
    {
        $result = $request->path();
        try {
            $route = $request->route();
            /** @var BaseController $controller */
            $controller = $route->getController();
            /** @var Module $module */
            $module = \Module::find($controller->moduleName());
            $result = config(
                $module->getName() . '.config.route.' . $route->getName() . '.depend',
                $result
            );
        } catch (\Throwable $e) {
        }

        return $result;
    }
}

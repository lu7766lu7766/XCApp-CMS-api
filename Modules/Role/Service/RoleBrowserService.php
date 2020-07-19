<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/9
 * Time: 上午 11:01
 */

namespace Modules\Role\Service;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Role\Http\Requests\RoleIndexRequest;
use Modules\Role\Repository\RoleResourceRepo;
use Modules\Role\Scope\RoleScope;

class RoleBrowserService
{
    use Singleton;
    /**
     * @var RoleResourceRepo
     */
    protected $repo;
    /**
     * @var Authenticatable
     */
    private $auth;
    /**
     * @var RoleScope
     */
    private $scope;

    /**
     * @inheritdoc
     */
    protected function init(Authenticatable $auth, RoleScope $scope)
    {
        $this->auth = $auth;
        $this->scope = $scope;
        $this->repo = app(RoleResourceRepo::class);
    }

    /**
     * @param RoleIndexRequest $request
     * @return array
     */
    public function getList(RoleIndexRequest $request)
    {
        $roles = $this->repo->getEnableRolesByAccountId($this->auth->getAuthIdentifier());
        $scopeRole = $this->scope->mergeBrowserBoundary($roles);
        $result = $this->repo->getCodeScopeCanAssignRoleList($scopeRole, $request->getPage(), $request->getPerpage());

        return $result->toArray();
    }

    /**
     * @return int
     */
    public function total()
    {
        $roles = $this->repo->getEnableRolesByAccountId($this->auth->getAuthIdentifier());
        $scopeRole = $this->scope->mergeBrowserBoundary($roles);

        return $this->repo->getCodeScopeCanAssignRoleCount($scopeRole);
    }
}

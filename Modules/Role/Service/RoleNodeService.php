<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/9
 * Time: 上午 11:01
 */

namespace Modules\Role\Service;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Base\Support\Scalar\ArrayMaster;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Node\Repository\NodeRepo;
use Modules\Role\Entities\Role;
use Modules\Role\Http\Requests\GetTargetNodeMapRequest;
use Modules\Role\Http\Requests\RoleNodeConfigureRequest;
use Modules\Role\Repository\RoleResourceRepo;
use Modules\Role\Scope\RoleScope;

class RoleNodeService
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
     * @param RoleNodeConfigureRequest $request
     * @return array
     */
    public function deploy(RoleNodeConfigureRequest $request)
    {
        $result = [];
        $roles = $this->repo->getEnableRolesByAccountId($this->auth->getAuthIdentifier());
        if (!is_null($role = $this->retrieveRoleWithRoles($request->getId(), $roles))) {
            $sync = $this->transformToDeployData($request);
            if (ArrayMaster::isList($sync)) {
                $result = $this->repo->deployNodePermission($role, $sync);
            }
        }

        return $result;
    }

    /**
     * @param GetTargetNodeMapRequest $request
     * @return array
     */
    public function map(GetTargetNodeMapRequest $request)
    {
        return $this->mapById($request->getId());
    }

    /**
     * @param int $id
     * @return array
     */
    private function mapById(int $id)
    {
        $result = [];
        $roles = $this->repo->getEnableRolesByAccountId($this->auth->getAuthIdentifier());
        if (!is_null($role = $this->retrieveRoleWithRoles($id, $roles))) {
            $result = app(NodeRepo::class)->getFullNodeWithRolesMaxPermission($role->getKey())->all();
        }

        return $result;
    }

    /**
     * @param int $targetRoleId 查詢對象的角色id
     * @param Role[]|\Illuminate\Support\Collection $roles
     * @return Role|null
     */
    private function retrieveRoleWithRoles(int $targetRoleId, $roles)
    {
        $scopeRole = $this->scope->mergeBrowserBoundary($roles);

        return $this->repo->firstScopeRoleIfCanAssign($scopeRole, $targetRoleId);
    }

    /**
     * Transform to role sync node with permission data,
     * this will limit the permission of node by authenticatable.
     * @param RoleNodeConfigureRequest $request
     * @return array
     */
    private function transformToDeployData(RoleNodeConfigureRequest $request)
    {
        $result = [];
        foreach ($request->getNodes() as $node) {
            $result[$node['id']] = ['method_permission' => $node['permission']];
        }

        return $result;
    }
}

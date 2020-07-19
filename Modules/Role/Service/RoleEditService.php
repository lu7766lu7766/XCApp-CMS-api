<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/9
 * Time: 上午 11:01
 */

namespace Modules\Role\Service;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Role\Constants\RoleInherentConstants;
use Modules\Role\Entities\Role;
use Modules\Role\Http\Requests\RoleDeleteRequest;
use Modules\Role\Http\Requests\RoleEditRequest;
use Modules\Role\Http\Requests\RoleInfoRequest;
use Modules\Role\Repository\RoleResourceRepo;
use Modules\Role\Scope\RoleScope;

class RoleEditService
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

    protected function init(Authenticatable $auth, RoleScope $scope)
    {
        $this->auth = $auth;
        $this->scope = $scope;
        $this->repo = app(RoleResourceRepo::class);
    }

    /**
     * @param RoleInfoRequest $request
     * @return Role|null
     */
    public function find(RoleInfoRequest $request)
    {
        $roles = $this->repo->getEnableRolesByAccountId($this->auth->getAuthIdentifier());
        $scopeRole = $this->scope->mergeBrowserBoundary($roles);
        $result = $this->repo->firstScopeRoleIfCanAssign($scopeRole, $request->getId());

        return $result;
    }

    /**
     * @param string $displayName
     * @param string $code
     * @param string $assign 是否提供給一般使用者使用 'Y' or 'N'
     * @param string $edit 能否被編輯.
     * @param string $enable
     * @param int $id
     * @return Role|null
     */
    public function edit(
        string $displayName,
        string $code,
        string $assign = 'Y',
        string $edit = 'N',
        string $enable = 'Y',
        int $id = 0
    ) {
        $roles = $this->repo->getEnableRolesByAccountId($this->auth->getAuthIdentifier());
        $scopeRole = $this->scope->mergeBrowserBoundary($roles);
        $role = $this->repo->saveIfCanEdit(
            [
                'display_name' => $displayName,
                'code'         => $code,
                'is_assign'    => $assign,
                'can_edit'     => $edit,
                'enable'       => $enable
            ],
            $id,
            $scopeRole
        );

        return $role;
    }

    /**
     * @param RoleEditRequest $request
     * @return Role|null
     */
    public function editCustomRole(RoleEditRequest $request)
    {
        return $this->edit(
            $request->getName(),
            RoleInherentConstants::CUSTOM,
            NYEnumConstants::YES,
            NYEnumConstants::YES,
            $request->getEnable(),
            $request->getId()
        );
    }

    /**
     * True is delete ,otherwise false.
     * @param RoleDeleteRequest $request
     * @return int
     */
    public function deleteCustomRole(RoleDeleteRequest $request)
    {
        return $this->repo->delete($request->getId(), RoleInherentConstants::CUSTOM);
    }
}

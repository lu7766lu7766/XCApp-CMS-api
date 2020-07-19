<?php
/**
 * Created by PhpStorm.
 * User: House
 * Date: 2018/10/2
 * Time: 下午 05:01
 */

namespace Modules\Role\Scope;

use Modules\Base\Support\Scalar\ArrayMaster;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Role\Constants\RoleInherentConstants;
use Modules\Role\Entities\Role;

/**
 * Class RoleScope
 * @package Modules\Role\Scope
 */
class RoleScope
{
    use Singleton;
    private static $mapRoleCanSeeScope = [
        RoleInherentConstants::ADMIN          => [
            RoleInherentConstants::MEMBER,
            RoleInherentConstants::SYSTEM_MANAGER,
            RoleInherentConstants::CUSTOM,
        ],
        RoleInherentConstants::SYSTEM_MANAGER => [
            RoleInherentConstants::CUSTOM,
        ],
        RoleInherentConstants::CUSTOM         => [
            RoleInherentConstants::CUSTOM,
        ]
    ];

    /**
     * @param string $code
     * @return array Role codes, if not set return empty array.
     */
    public function browserBoundary(string $code)
    {
        $result = [];
        if (isset(self::$mapRoleCanSeeScope[$code])) {
            $result = self::$mapRoleCanSeeScope[$code];
        }

        return $result;
    }

    /**
     * @param Role[] $roles
     * @return array
     */
    public function mergeBrowserBoundary($roles)
    {
        $result = [];
        foreach ($roles as $role) {
            $result = ArrayMaster::arrayMerge($result, $this->browserBoundary($role->code));
        }

        return $result;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 12:59
 */

namespace Modules\Account\Service;

use Modules\Base\Support\Scalar\ArrayMaster;
use Modules\Role\Constants\RoleInherentConstants;
use Modules\Role\Repository\RoleResourceRepo;

class AccountRoleSpecificService
{
    /**
     * @param string $roleCode
     * @return array
     */
    public static function getAccountVisibleRoleRelation($roleCode)
    {
        $list = [
            RoleInherentConstants::ADMIN          => [
                RoleInherentConstants::SYSTEM_MANAGER,
                RoleInherentConstants::CUSTOM
            ],
            RoleInherentConstants::SYSTEM_MANAGER => [
                RoleInherentConstants::SYSTEM_MANAGER,
                RoleInherentConstants::CUSTOM
            ],
            RoleInherentConstants::CUSTOM         => [
                RoleInherentConstants::CUSTOM
            ]
        ];

        return $list[$roleCode] ?? [];
    }

    /**
     * Fetch account visible role list
     * @param array $roleCodeList
     * @return array
     */
    public static function getAccountVisibleRoleList($roleCodeList)
    {
        $result = [];
        foreach ($roleCodeList as $roleCode) {
            $result = array_merge($result, self::getAccountVisibleRoleRelation($roleCode));
        }
        $result = array_unique($result);
        if (!ArrayMaster::isList($result)) {
            return [];
        }

        return $result;
    }

    /**
     * 取得account所有角色
     * @param $accountId
     * @return array
     */
    public static function getLoginUserRole($accountId)
    {
        $user = app(RoleResourceRepo::class)->getEnableRolesByAccountId($accountId);
        $roleCodeList = $user->pluck('code')->toArray();

        return $roleCodeList;
    }
}

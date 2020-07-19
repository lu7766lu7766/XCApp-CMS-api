<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 12:59
 */

namespace Modules\Account\Service;

use Modules\Account\Contract\IAccountRoleSpecific;
use Modules\Account\Repository\AccountRoleSpecific\AccountRoleSpecificRepo;
use Modules\Base\Constants\ApiCode\Account10000\AccountCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Scalar\ArrayMaster;
use Modules\Role\Constants\RoleInherentConstants;
use Modules\Role\Entities\Role;
use Modules\Role\Repository\RoleResourceRepo;

class AccountResourceService
{
    /**
     * @param int $id account id.
     */
    public function findWithRoles(int $id)
    {
    }

    /**
     * 取得帳號角色對應的repo
     * @param int $accountId
     * @return IAccountRoleSpecific
     * @throws ApiErrorCodeException
     */
    public static function fetchAccountRoleRepo(int $accountId)
    {
        $roleCodeList = AccountRoleSpecificService::getLoginUserRole($accountId);
        if (!ArrayMaster::isList($roleCodeList)) {
            throw new ApiErrorCodeException([AccountCodeConstants::ACCOUNT_NEED_SET_ROLE]);
        };
        $visibleRoleList = AccountRoleSpecificService::getAccountVisibleRoleList($roleCodeList);

        return app(AccountRoleSpecificRepo::class)
            ->setIllegalRoleCode(self::fetchAccountLockRole($visibleRoleList));
    }

    /**
     * 取得不可用的角色資訊
     * @param array $usableRoleList
     * @return array
     */
    public static function fetchAccountLockRole(array $usableRoleList)
    {
        return array_diff(RoleInherentConstants::enum(), $usableRoleList);
    }

    /**
     * 取得帳號可用的角色資訊
     * @param int $accountId
     * @return Role[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function fetchAccountUsableRole(int $accountId)
    {
        $roleCodeList = AccountRoleSpecificService::getLoginUserRole($accountId);
        $visibleRoleCodeList = AccountRoleSpecificService::getAccountVisibleRoleList($roleCodeList);
        if (count($visibleRoleCodeList) < 1) {
            return null;
        }

        return app(RoleResourceRepo::class)->getRoleByRoleCode($visibleRoleCodeList);
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/6
 * Time: 下午 02:35
 */

namespace Modules\Account\Contract;

use Illuminate\Support\Collection;
use Modules\Account\Entities\Account;

interface IAccountRoleSpecific
{
    /**
     * Use the account fuzzy comparison or role id to find the matching data
     * @param string|null $account
     * @param int $roleId
     * @param int $page
     * @param int $perpage
     * @return Account[]|Collection
     */
    public function getAccountListByAccountRoleId(
        string $account = null,
        int $roleId = 0,
        int $page = 1,
        int $perpage = 10
    );

    /**
     * Use the account fuzzy comparison or role id to find the matching data total number
     * @param string $account
     * @param int $roleId
     * @return int
     */
    public function getAccountListTotalByAccountRoleId(string $account = null, int $roleId = 0);

    /**
     * Get the information of account by account id
     * @param int $accountId
     * @return Account|null
     */
    public function getAccountByAccountId(int $accountId);

    /**
     * Get the information of account list by account id
     * @param array $accountIdList
     * @return Account[]|Collection
     */
    public function getAccountListByAccountIds(array $accountIdList);
}

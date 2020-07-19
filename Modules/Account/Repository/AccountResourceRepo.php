<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/6
 * Time: 下午 01:59
 */

namespace Modules\Account\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\Account\Entities\Account;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Support\Scalar\ArrayMaster;

class AccountResourceRepo
{
    /**
     * @param string|null $account
     * @param int $page
     * @param int $perpage
     * @return Account[]|Collection
     */
    public function getAccountListByAccount(
        string $account = null,
        int $page = 1,
        int $perpage = 10
    ) {
        try {
            $builder = Account::with([
                'roles' => function ($builder) {
                    /** @var Builder $builder */
                    $builder->where('role.enable', NYEnumConstants::YES);
                },
                'used'
            ]);
            if (!is_null($account)) {
                $builder->where('account', 'LIKE', "%{$account}%");
            }
            $result = $builder->forPage($page, $perpage)->get();
        } catch (\Throwable $e) {
            $result = new Collection();
        }

        return $result;
    }

    /**
     * Get the account list information by role code
     * @param int $roleId
     * @param int $page
     * @param int $perpage
     * @return Account[]|Collection
     */
    public function getAccountListByRoleId(
        int $roleId,
        int $page = 1,
        int $perpage = 10
    ) {
        try {
            $result = Account::with([
                'roles' => function ($builder) {
                    /** @var Builder $builder */
                    $builder->where('role.enable', NYEnumConstants::YES);
                },
                'used'
            ])
                ->whereHas('roles', function ($builder) use ($roleId) {
                    /** @var Builder $builder */
                    $builder->where('role.id', $roleId);
                });
            $result = $result->forPage($page, $perpage)->get();
        } catch (\Throwable $e) {
            $result = new Collection();
        }

        return $result;
    }

    /**
     * Get account information by account id
     * @param int $accountId
     * @param array $lockRoleCodeList
     * @return Account|null
     */
    public function getAccountByAccountId(int $accountId, array $lockRoleCodeList = [])
    {
        try {
            $builder = Account::with([
                'roles' => function ($builder) {
                    /** @var Builder $builder */
                    $builder->where('role.enable', NYEnumConstants::YES);
                },
                'used'
            ])
                ->where('account.id', $accountId);
            if (ArrayMaster::isList($lockRoleCodeList)) {
                $builder->whereDoesntHave('roles', function ($builder) use ($lockRoleCodeList) {
                    /** @var Builder $builder */
                    $builder->whereIn('role.code', $lockRoleCodeList);
                });
            }
            $result = $builder->first();
        } catch (\Throwable $e) {
            $result = null;
        }

        return $result;
    }

    /**
     * @param array $accountIdList
     * @param array $lockRoleCodeList
     * @return Account[]|Collection
     */
    public function getAccountListByAccountIds(array $accountIdList, array $lockRoleCodeList = [])
    {
        try {
            $builder = Account::query()->whereIn('account.id', $accountIdList);
            if (ArrayMaster::isList($lockRoleCodeList)) {
                $builder->whereDoesntHave('roles', function ($builder) use ($lockRoleCodeList) {
                    /** @var Builder $builder */
                    $builder->whereIn('role.code', $lockRoleCodeList);
                });
            }
            $result = $builder->get();
        } catch (\Throwable $e) {
            $result = new Collection();
        }

        return $result;
    }

    /**
     * 取得帳號
     * @param string $account
     * @return Account|null
     */
    public function getMatchAccount(string $account)
    {
        return Account::query()->where('account', $account)
            ->first();
    }
}

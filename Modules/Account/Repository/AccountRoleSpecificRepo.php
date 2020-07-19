<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2018/9/28
 * Time: 下午 06:23
 */

namespace Modules\Account\Repository\AccountRoleSpecific;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\Account\Contract\IAccountRoleSpecific;
use Modules\Account\Entities\Account;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Support\Scalar\ArrayMaster;

class AccountRoleSpecificRepo implements IAccountRoleSpecific
{
    /**
     * @var array
     */
    private $illegalRoleCode;

    /**
     * @return array
     */
    public function getIllegalRoleCode()
    {
        return $this->illegalRoleCode;
    }

    /**
     * @param array $illegalRoleCode
     * @return $this
     */
    public function setIllegalRoleCode(array $illegalRoleCode)
    {
        $this->illegalRoleCode = $illegalRoleCode;

        return $this;
    }

    /**
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
    ) {
        try {
            $roleCodeList = $this->getIllegalRoleCode();
            $builder = Account::with([
                'roles' => function ($builder) use ($roleId, $roleCodeList) {
                    /** @var Builder $builder */
                    $builder->where('role.enable', NYEnumConstants::YES);
                },
                'used'
            ]);
            if (!is_null($account)) {
                $builder->where('account', 'LIKE', "%{$account}%");
            }
            if ($roleId > 0) {
                $builder->whereHas('roles', function ($builder) use ($roleId) {
                    /** @var Builder $builder */
                    $builder->where('role.id', $roleId);
                });
            }
            $result = $builder->whereDoesntHave('roles', function ($builder) use ($roleCodeList) {
                /** @var Builder $builder */
                if (ArrayMaster::isList($roleCodeList)) {
                    $builder->whereIn('role.code', $roleCodeList);
                }
            })
                ->forPage($page, $perpage)
                ->get();
        } catch (\Throwable $e) {
            $result = new Collection();
        }

        return $result;
    }

    /**
     * @param string|null $account
     * @param int $roleId
     * @return int
     */
    public function getAccountListTotalByAccountRoleId(
        string $account = null,
        int $roleId = 0
    ) {
        try {
            $roleCodeList = $this->getIllegalRoleCode();
            $builder = Account::query();
            if (!is_null($account)) {
                $builder->where('account', 'LIKE', "%{$account}%");
            }
            if ($roleId > 0) {
                $builder->whereHas('roles', function ($builder) use ($roleId) {
                    /** @var Builder $builder */
                    $builder->where('role.id', $roleId);
                });
            }
            $builder->whereDoesntHave('roles', function ($builder) use ($roleCodeList) {
                /** @var Builder $builder */
                if (ArrayMaster::isList($roleCodeList)) {
                    $builder->whereIn('role.code', $roleCodeList);
                }
            });
            $result = $builder->count();
        } catch (\Throwable $e) {
            $result = 0;
        }

        return $result;
    }

    /**
     * @param int $accountId
     * @return Account|null
     */
    public function getAccountByAccountId(int $accountId)
    {
        try {
            $roleCodeList = $this->getIllegalRoleCode();
            $builder = Account::with([
                'roles' => function ($builder) use ($roleCodeList) {
                    /** @var Builder $builder */
                    $builder->where('role.enable', NYEnumConstants::YES);
                },
                'used'
            ])
                ->where('account.id', $accountId);
            if (ArrayMaster::isList($roleCodeList)) {
                $builder->whereDoesntHave('roles', function ($builder) use ($roleCodeList) {
                    /** @var Builder $builder */
                    $builder->whereIn('role.code', $roleCodeList);
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
     * @return Account[]|Collection
     */
    public function getAccountListByAccountIds(array $accountIdList)
    {
        try {
            $roleCodeList = $this->getIllegalRoleCode();
            $builder = Account::with([
                'roles' => function ($builder) use ($roleCodeList) {
                    /** @var Builder $builder */
                    $builder->where('role.enable', NYEnumConstants::YES);
                },
                'used'
            ])
                ->whereIn('account.id', $accountIdList);
            if (ArrayMaster::isList($roleCodeList)) {
                $builder->whereDoesntHave('roles', function ($builder) use ($roleCodeList) {
                    /** @var Builder $builder */
                    $builder->whereIn('role.code', $roleCodeList);
                });
            }

            return $builder->get();
        } catch (\Throwable $e) {
            $result = new Collection();
        }

        return $result;
    }
}

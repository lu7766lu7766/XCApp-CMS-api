<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/9
 * Time: 上午 11:06
 */

namespace Modules\Role\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Node\Entities\RoleNode;
use Modules\Role\Entities\Role;

class RoleResourceRepo
{
    /**
     * 新增帳號
     * @param array $attribute
     * @param int $id
     * @param array $codes
     * @return Role|null
     */
    public function saveIfCanEdit(array $attribute, int $id, array $codes)
    {
        $orm = null;
        try {
            /** @var Role $orm */
            $orm = Role::query()
                ->where('id', $id)
                ->where('can_edit', NYEnumConstants::YES)
                ->whereIn('code', $codes)
                ->firstOrNew([]);
            $orm->fill($attribute)->save();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * @param array $codes
     * @param int $page
     * @param int $perpage
     * @return Role[]|Collection
     */
    public function getCodeScopeCanAssignRoleList(array $codes, int $page = 1, int $perpage = 20)
    {
        $result = [];
        try {
            $result = Role::query()
                ->whereIn('code', $codes)
                ->where('is_assign', NYEnumConstants::YES)
                ->forPage($page, $perpage)
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * 角色總數
     * @param array $codes
     * @return int
     */
    public function getCodeScopeCanAssignRoleCount(array $codes)
    {
        $result = 0;
        try {
            $result = Role::query()
                ->whereIn('code', $codes)
                ->where('is_assign', NYEnumConstants::YES)
                ->count('id');
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param array $codes
     * @param int $id
     * @return Role|null
     */
    public function firstScopeRoleIfCanAssign(array $codes, int $id)
    {
        try {
            $result = Role::where('id', $id)
                ->whereIn('code', $codes)
                ->where('is_assign', NYEnumConstants::YES)
                ->first();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            $result = null;
        }

        return $result;
    }

    /**
     * Delete successful and the effect row count will return ,otherwise 0.
     * @param int $id
     * @param string $code
     * @return int
     */
    public function delete(int $id, string $code)
    {
        try {
            $result = Role::query()
                ->where('id', $id)
                ->where('code', $code)
                ->delete();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            $result = 0;
        }

        return $result;
    }

    /**
     * @param int $accountId
     * @return Role[]|\Illuminate\Support\Collection
     */
    public function getEnableRolesByAccountId(int $accountId)
    {
        try {
            $result = Role::where('enable', NYEnumConstants::YES)
                ->whereHas('accounts', function (Builder $builder) use ($accountId) {
                    $builder->where('account.id', $accountId);
                })->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            $result = collect();
        }

        return $result;
    }

    /**
     * @param Role $orm
     * @param array $sync
     * @return array
     */
    public function deployNodePermission(Role $orm, array $sync)
    {
        $result = [];
        try {
            \DB::transaction(function () use ($orm, $sync, &$result) {
                $result = $orm->nodes()->sync($sync);
            });
        } catch (\Throwable $e) {
        }

        return $result;
    }

    /**
     * @param array $ids
     * @return RoleNode[]|Collection
     */
    public function getNodePermissionByIds(array $ids)
    {
        $result = collect();
        try {
            $result = RoleNode::whereHas('roles', function (Builder $builder) use ($ids) {
                $builder->whereIn('role.id', $ids);
            })
                ->select([
                    \DB::raw('max(method_permission) as permission'),
                    'node_id'
                ])
                ->groupBy('node_id')
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * 透過role code找出相關的角色資訊
     * @param array $codes
     * @return Role|null
     */
    public function getRoleByRoleCode(array $codes = [])
    {
        try {
            $orm = Role::query();
            if (count($codes) > 0) {
                $orm->whereIn('code', $codes);
            }
            $result = $orm->get();
        } catch (\Throwable $e) {
            $result = null;
        }

        return $result;
    }
}

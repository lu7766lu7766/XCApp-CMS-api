<?php
/**
 * Created by PhpStorm.
 * User: House
 * Date: 2018/9/18
 * Time: 下午 03:31
 */

namespace Modules\Node\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Node\Entities\Node;
use Modules\Node\Entities\NodeSort;

class NodeRepo
{
    /**
     * @param array $roleIds
     * @return Node[]|Collection
     */
    public function getRoleNodes(array $roleIds)
    {
        $result = collect();
        try {
            $result = Node::whereHas('roles', function (Builder $builder) use ($roleIds) {
                $builder->whereIn('role.id', $roleIds);
            })
                ->with([
                    'permission' => function (Relation $builder) use ($roleIds) {
                        $builder->select([
                            \DB::raw('max(method_permission) as permission'),
                            'node_id'
                        ])->whereIn('role_id', $roleIds)->groupBy('node_id');
                    }
                ])
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $roleId
     * @return Node[]|Collection
     */
    public function getFullNodeWithRolesMaxPermission(int $roleId)
    {
        $result = collect();
        try {
            $result = Node::query()
                ->with([
                    'permission' => function (Relation $builder) use ($roleId) {
                        $builder->select([
                            \DB::raw('method_permission as permission'),
                            'node_id'
                        ])->whereHas('roles', function (Builder $builder) use ($roleId) {
                            $builder->where('role.id', $roleId);
                        });
                    }
                ])
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $accountId
     * @return NodeSort|null
     */
    public function sortInfo(int $accountId)
    {
        $result = null;
        try {
            $result = NodeSort::query()
                ->select('sort')
                ->where('account_id', $accountId)
                ->first();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $accountId
     * @return NodeSort|null
     */
    public function find(int $accountId)
    {
        $orm = null;
        try {
            $orm = NodeSort::where('account_id', $accountId)->first();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * @param NodeSort $orm
     * @return NodeSort|null
     */
    public function saveSort(NodeSort $orm)
    {
        try {
            $orm->save();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }
}

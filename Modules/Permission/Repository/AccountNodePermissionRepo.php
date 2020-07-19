<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/30
 * Time: 下午 04:08
 */

namespace Modules\Permission\Repository;

use Illuminate\Database\Eloquent\Builder;
use Modules\Account\Entities\Account;

class AccountNodePermissionRepo
{
    /**
     * @param int $id
     * @param string $routeUri
     * @param int $permission
     * @return Account
     */
    public function findAccountWithPermission(int $id, string $routeUri, int $permission)
    {
        $result = null;
        try {
            $result = Account::where('id', $id)
                ->whereHas('roles', function ($builder) use ($permission, $routeUri) {
                    /** @var Builder $builder */
                    $builder->whereHas('nodes', function ($builder) use ($permission, $routeUri) {
                        /** @var Builder $builder */
                        $builder->where('route_uri', $routeUri)
                            ->whereRaw("({$permission} & method_permission) = {$permission}");
                    });
                })
                ->first();
        } catch (\Throwable $e) {
            logger($e->getMessage());
        }

        return $result;
    }
}

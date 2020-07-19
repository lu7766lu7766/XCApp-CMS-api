<?php
/**
 * Created by PhpStorm.
 * User: House
 * Date: 2018/9/19
 * Time: 下午 03:10
 */

namespace Modules\Node\Repository;

use Illuminate\Support\Collection;
use Modules\Base\Contract\IModelRetrieve;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Role\Entities\Role;

class RoleRetrieveRepo implements IModelRetrieve
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function getBuilder()
    {
        return Role::query();
    }

    /**
     * @inheritdoc
     */
    public function findById($id): Collection
    {
        $result = collect();
        try {
            $result = Role::query()->findMany($id);
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function findByClosure(\Closure $callback): Collection
    {
        $result = collect();
        try {
            $builder = $this->getBuilder();
            $callback($builder);
            $result = $builder->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: House
 * Date: 2018/9/19
 * Time: 下午 02:51
 */

namespace Modules\Base\Contract;

use Illuminate\Support\Collection;

interface IModelRetrieve
{
    /**
     * @param int|string|array $id
     * @return Collection
     */
    public function findById($id): Collection;

    /**
     * The closure function first param will pass a Illuminate\Database\Eloquent\Builder instance.
     * @param \Closure $callback
     * @return Collection the Illuminate\Database\Eloquent\Builder::get() result.
     */
    public function findByClosure(\Closure $callback): Collection;
}

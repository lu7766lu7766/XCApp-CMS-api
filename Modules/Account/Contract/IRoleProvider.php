<?php
/**
 * Created by PhpStorm.
 * User: House
 * Date: 2018/11/1
 * Time: 下午 02:03
 */

namespace Modules\Account\Contract;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface IRoleProvider
{
    /**
     * @param string $code
     * @return Model
     */
    public function getByCode(string $code);

    /**
     * @param array $ids
     * @return Collection
     */
    public function getByIds(array $ids);
}

<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/4
 * Time: 下午 01:11
 */

namespace Modules\News\Contract;

use Illuminate\Support\Collection;

interface ITopic
{
    /**
     * @return Collection
     */
    public function all(): Collection;
}

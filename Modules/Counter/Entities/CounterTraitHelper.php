<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/5
 * Time: 下午 03:57
 */

namespace Modules\Counter\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Util\LaravelLoggerUtil;

/**
 * Trait CounterTraitHelper
 * @package Modules\Counter\Entities
 * @mixin Model
 * @property Counter counter
 */
trait CounterTraitHelper
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function counter()
    {
        return $this->morphOne(Counter::class, "relative");
    }

    /**
     * @param int $times
     * @return Counter
     */
    public function incrementRecord(int $times = 1)
    {
        if ($this->counter()->exists()) {
            $this->counter()->increment('record', $times);
        } else {
            $this->counter()->create()->refresh();
        }

        return $this->counter()->first();
    }

    /**
     * @return int
     */
    public function deleteRecord()
    {
        $count = 0;
        try {
            $count = $this->counter()->delete();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $count;
    }
}

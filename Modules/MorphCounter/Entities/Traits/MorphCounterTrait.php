<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/7
 * Time: 下午 03:23
 */

namespace Modules\MorphCounter\Entities\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\MorphCounter\Entities\MorphCounter;

/**
 * Trait MorphCounterTrait
 * @package Modules\MorphCounter\Entities\Traits
 * @property Collection|MorphCounter[] morphCounter
 * @mixin Model
 */
trait MorphCounterTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function morphCounter()
    {
        return $this->morphMany(MorphCounter::class, 'morph_counter', 'morph_counter_type', 'morph_counter_target_id');
    }

    /**
     * 增加反應數
     * @param int $kind 種類
     * @return bool
     * @see MorphCounterConstants 請參考此CLASS瞭解有哪幾種種類
     */
    public function increaseMorphCounter(int $kind)
    {
        $result = false;
        try {
            $counter = $this->existsMorphCounter($kind);
            if ($counter) {
                $this->morphCounter()->where('morph_counter_kind', $kind)->increment('morph_counter', 1);
            } else {
                $this->morphCounter()->create(['morph_counter_kind' => $kind]);
            }
            $result = true;
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * 減少反應數
     * @param int $kind 種類
     * @return bool
     * @see MorphCounterConstants 請參考此CLASS瞭解有哪幾種種類
     */
    public function decreaseMorphCounter(int $kind)
    {
        $result = false;
        try {
            $counter = $this->existsMorphCounter($kind, function (Builder $builder) {
                $builder->where('morph_counter', '>', '0');
            });
            if ($counter) {
                $this->morphCounter()->where('morph_counter_kind', $kind)->decrement('morph_counter', 1);
            }
            $result = true;
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $morphCounterKind
     * @param \Closure|null $condition 額外設定
     * @return bool
     */
    private function existsMorphCounter(int $morphCounterKind, \Closure $condition = null)
    {
        $condition = $condition ??
            function () {
            };
        $counter = $this->morphCounter()
            ->where('morph_counter_kind', $morphCounterKind)
            ->where($condition)
            ->exists();

        return $counter;
    }
}

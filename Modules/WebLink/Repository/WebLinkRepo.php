<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/2
 * Time: 下午 01:48
 */

namespace Modules\WebLink\Repository;

use Illuminate\Database\Eloquent\Builder;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\WebLink\Entities\WebLinkOrm;

class WebLinkRepo
{
    /**
     * @param int $page
     * @param int $perpage
     * @param string|null $name
     * @param int|null $categoryId
     * @return array|\Illuminate\Support\Collection
     */
    public function list(int $page = 1, int $perpage = 20, string $name = null, int $categoryId = null)
    {
        $result = [];
        try {
            $query = WebLinkOrm::query()
                ->with(WebLinkOrm::CATEGORY, WebLinkOrm::APP_MANAGEMENT, 'used')
                ->whereHas(WebLinkOrm::CATEGORY, function (Builder $builder) use ($categoryId) {
                    $builder->where('web_link_category.status', CommonStatusConstants::ENABLE);
                    if (!is_null($categoryId)) {
                        $builder->where('web_link_category.id', $categoryId);
                    }
                });
            if (!is_null($name)) {
                $query->where('name', 'like', '%' . $name . '%');
            }
            $result = $query->forPage($page, $perpage)->orderBy('id', 'DESC')->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param array $attribute
     * @param array $appId
     * @param int|null $imageId
     * @return WebLinkOrm|null
     */
    public function store(array $attribute, array $appId = [], int $imageId = null)
    {
        $orm = null;
        try {
            \DB::transaction(function () use ($attribute, $appId, &$orm, $imageId) {
                $orm = new WebLinkOrm();
                $orm->fill($attribute)->save();
                $orm->appManagement()->attach($appId);
                $orm->fileEnabled([$imageId]);
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * @param array $attribute
     * @param int $id
     * @param array $appId
     * @param int|null $imageId
     * @return WebLinkOrm|null
     */
    public function update(array $attribute, int $id, array $appId = [], int $imageId = null)
    {
        $orm = null;
        try {
            $orm = WebLinkOrm::whereHas(WebLinkOrm::CATEGORY, function (Builder $builder) {
                $builder->where('web_link_category.status', CommonStatusConstants::ENABLE);
            })->where('id', $id)->first();
            if (!is_null($orm)) {
                \DB::transaction(function () use ($attribute, $appId, &$orm, $imageId) {
                    $orm->fill($attribute)->save();
                    $orm->appManagement()->sync($appId);
                    $orm->fileEnabled([$imageId]);
                });
            }
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * @param array $ids
     * @return int
     */
    public function delete(array $ids)
    {
        $result = 0;
        try {
            \DB::transaction(function () use ($ids, &$result) {
                $orm = WebLinkOrm::whereHas(WebLinkOrm::CATEGORY, function (Builder $builder) {
                    $builder->where('web_link_category.status', CommonStatusConstants::ENABLE);
                })->whereIn('id', $ids)->get();
                foreach ($orm as $item) {
                    $item->fileDisabled();
                    $result += $item->delete();
                }
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string|null $name
     * @param int|null $categoryId
     * @return int
     */
    public function total(string $name = null, int $categoryId = null)
    {
        $result = 0;
        try {
            $query = WebLinkOrm::query()
                ->whereHas(WebLinkOrm::CATEGORY, function (Builder $builder) {
                    $builder->where('status', CommonStatusConstants::ENABLE);
                });
            if (!is_null($name)) {
                $query->where('name', 'like', '%' . $name . '%');
            }
            if (!is_null($categoryId)) {
                $query->where('category_id', $categoryId);
            }
            $result = $query->count();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param array $ids
     * @return int
     */
    public function checkCategoryInsideData(array $ids)
    {
        $result = 0;
        try {
            $result = WebLinkOrm::whereHas(WebLinkOrm::CATEGORY, function (Builder $builder) {
                $builder->where('web_link_category.status', CommonStatusConstants::ENABLE);
            })->whereIn('category_id', $ids)->count();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}

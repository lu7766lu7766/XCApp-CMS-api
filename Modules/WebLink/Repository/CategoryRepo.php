<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/2
 * Time: 上午 11:07
 */

namespace Modules\WebLink\Repository;

use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\WebLink\Entities\CategoryOrm;

class CategoryRepo
{
    /**
     * @param int $page
     * @param int $perpage
     * @param string|null $name
     * @return array|\Illuminate\Support\Collection
     */
    public function list(int $page = 1, int $perpage = 20, string $name = null)
    {
        $result = [];
        try {
            $query = CategoryOrm::query()->with('used');
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
     * @param int|null $imageId
     * @return CategoryOrm|null
     */
    public function store(array $attribute, int $imageId = null)
    {
        $orm = null;
        try {
            $orm = new CategoryOrm();
            \DB::transaction(function () use ($attribute, $imageId, &$orm) {
                $orm->fill($attribute)->save();
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
     * @param int|null $imageId
     * @return CategoryOrm|null
     */
    public function update(array $attribute, int $id, int $imageId = null)
    {
        $orm = null;
        try {
            $orm = CategoryOrm::find($id);
            \DB::transaction(function () use ($attribute, $imageId, &$orm) {
                if (!is_null($orm)) {
                    $orm->fill($attribute)->save();
                    $orm->fileEnabled([$imageId]);
                }
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * @param array $ids
     * @return int|null
     */
    public function delete(array $ids)
    {
        $result = 0;
        try {
            \DB::transaction(function () use ($ids, &$result) {
                $orm = CategoryOrm::query()
                    ->whereIn('id', $ids)->get();
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
     * @return int
     */
    public function total(string $name = null)
    {
        $result = 0;
        try {
            $query = CategoryOrm::query();
            if (!is_null($name)) {
                $query->where('name', 'like', '%' . $name . '%');
            }
            $result = $query->count();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * 供內部使用(webLink列表頁options使用)
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function allCategory()
    {
        $result = [];
        try {
            $result = CategoryOrm::query()
                ->where('status', CommonStatusConstants::ENABLE)
                ->orderBy('id', 'DESC')
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}

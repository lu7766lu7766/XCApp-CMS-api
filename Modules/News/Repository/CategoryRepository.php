<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/28
 * Time: 下午 05:58
 */

namespace Modules\News\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\News\Entities\NewsCategory;

class CategoryRepository
{
    /**
     * @return NewsCategory
     */
    private function getCategoryModel()
    {
        return new NewsCategory();
    }

    /**
     * @param int $page 第幾頁
     * @param int $perpage 一頁筆數
     * @param string|null $search 收尋關鍵字
     * @return Collection|NewsCategory[]
     */
    public function getList(int $page, int $perpage, string $search = null)
    {
        /** @var Builder $query */
        $query = $this->getCategoryModel()->newQuery();
        if (!is_null($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        $query = $query->with('used');
        $query->select('*',
            \DB::raw(
                'if ((SELECT count( * ) FROM `news_management` WHERE 
                `news_category`.`id` = `news_management`.`category_id` ),false,true ) as can_delete'
            ));
        $query->orderBy('id', 'DESC');

        return $query->forPage($page, $perpage)->get();
    }

    /**
     * @param array $data
     * @param int|null $uploadImageID
     * @return null|NewsCategory
     */
    public function create(array $data, int $uploadImageID)
    {
        try {
            $item = null;
            \DB::transaction(function () use ($data, &$item, $uploadImageID) {
                $item = $this->getCategoryModel()->create($data);
                $item->fileEnabled([$uploadImageID]);
                $item->load('used');
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $item;
    }

    /**
     * @param int $id
     * @return NewsCategory|null
     */
    public function findFullInfo(int $id)
    {
        $item = $this->find($id);
        if (!is_null($item)) {
            $item->load('used');
        }

        return $item;
    }

    /**
     * @param int $id
     * @return NewsCategory|null
     */
    public function find(int $id)
    {
        $item = $this->getCategoryModel()->find($id);

        return $item;
    }

    /**
     * @param array $ids
     * @return int
     */
    public function destroy(array $ids)
    {
        try {
            $count = 0;
            \DB::transaction(function () use ($ids, &$count) {
                $count = $this->getCategoryModel()->getQuery()->whereIn('id', $ids)->delete();
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $count;
    }

    /**
     * @param string|null $search
     * @return int
     */
    public function total($search)
    {
        $query = $this->getCategoryModel()::query();
        if (!empty($search)) {
            $query = $query->where('name', 'like', '%' . $search . '%');
        }

        return $query->count();
    }

    /**
     * @param int $id
     * @param array $data
     * @param int $uploadImageID
     * @return NewsCategory|null
     */
    public function update(int $id, array $data, int $uploadImageID)
    {
        try {
            $item = null;
            \DB::transaction(function () use ($id, $data, &$item, $uploadImageID) {
                $item = $this->find($id);
                $item->update($data);
                $item->fileEnabled([$uploadImageID]);
                $item->load('used');
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $item;
    }

    /**
     * @return NewsCategory
     */
    public function getCategory()
    {
        return $this->getCategoryModel()->select('id', 'name')->get();
    }

    /**
     * 判斷名稱是否存在用
     * @param string $name
     * @param int|null $except
     * @return bool
     */
    public function findNameExcept(string $name, int $except = null)
    {
        $query = $this->getCategoryModel()::query();
        $query = $query->where('name', $name);
        if (!is_null($except)) {
            $query = $query->where('id', '!=', $except);
        }

        return $query->exists();
    }
}

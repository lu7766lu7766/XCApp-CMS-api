<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/2
 * Time: 下午 07:45
 */

namespace Modules\News\Repository;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\News\Entities\NewsManagement;

class ManagementRepository
{
    /**
     * @return NewsManagement
     */
    private function getManagementMode()
    {
        return new NewsManagement();
    }

    /**
     * 獲取清單
     * @param int $page
     * @param int $perpage
     * @param int|null $categoryId
     * @param string $search
     * @return Collection|NewsManagement[]
     */
    public function getLists(int $page, int $perpage, int $categoryId = null, string $search = '')
    {
        $query = $this->getManagementMode()::query();
        if (!is_null($categoryId)) {
            $query = $query->where('category_id', $categoryId);
        }
        if (!empty($search)) {
            $query = $query->where('name', 'like', '%' . $search . '%');
        }
        $query = $query->with([
            'used' => function (MorphToMany $query) {
                $query->with('fileUsed');
            }
        ]);
        $query = $query->with([
            'appManagement' => function (MorphToMany $query) {
                $query->select('app_management.id');
            }
        ])->orderBy('id', 'DESC');

        return $query->forPage($page, $perpage)->get();
    }

    /**
     * @param int $id
     * @return NewsManagement
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
     * @return NewsManagement|null
     */
    public function find(int $id)
    {
        $item = $this->getManagementMode()->find($id);

        return $item;
    }

    /**
     * @param array $data
     * @param array $topic
     * @param array $uploadIds
     * @param array $filesAttr
     * @return null|NewsManagement
     */
    public function create(array $data, array $topic, array $uploadIds, array $filesAttr)
    {
        try {
            $item = null;
            \DB::transaction(function () use ($data, &$item, $topic, $uploadIds, $filesAttr) {
                $item = $this->getManagementMode()->create($data);
                $item->appManagement()->attach($topic);
                $item->fileEnabled($uploadIds, $filesAttr);
                $item->load('used');
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $item;
    }

    /**
     * @param int $id
     * @param array $data
     * @param array $topic
     * @param array $uploadIds
     * @param array $filesAttr
     * @return null|NewsManagement
     */
    public function update(int $id, array $data, array $topic, array $uploadIds, array $filesAttr)
    {
        try {
            $item = null;
            \DB::transaction(function () use ($id, $data, &$item, $topic, $uploadIds, $filesAttr) {
                $item = $this->getManagementMode()->find($id);
                $item->update($data);
                $item->appManagement()->sync($topic);
                $item->forceSync($uploadIds, $filesAttr);
                $item->load('used');
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $item;
    }

    /**
     * @param array $id
     * @return int
     */
    public function destroy(array $id)
    {
        try {
            $count = 0;
            \DB::transaction(function () use ($id, &$count) {
                $items = $this->getManagementMode()->whereIn('id', $id)->get();
                $items->map(function (NewsManagement $item) use (&$count) {
                    $item->fileDisabled();
                    $item->delete();
                    $count++;
                });
            });

            return $count;
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $count;
    }

    /**
     * @param string $search
     * @param int|null $category
     * @return int
     */
    public function total(string $search, int $category = null)
    {
        $query = $this->getManagementMode()::query();
        if (!is_null($category)) {
            $query = $query->where('category_id', $category);
        }
        if (!empty($search)) {
            $query = $query->where('name', 'like', "%{$search}%");
        }

        return $query->count();
    }

    /**
     * 查找category是否存在
     * @param array $ids
     * @return bool
     */
    public function findCategory(array $ids)
    {
        return $this->getManagementMode()->whereIn('category_id', $ids)->exists();
    }
}

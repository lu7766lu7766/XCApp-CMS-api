<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/12
 * Time: 下午 02:40
 */

namespace Modules\PushNotification\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\PushNotification\Entities\PushNotification;

class PushNotificationRepository
{
    /**
     * @return PushNotification
     */
    public function getNotificationModel()
    {
        return new PushNotification();
    }

    /**
     * @param array $data
     * @param array $appIdArr
     * @return PushNotification|null
     */
    public function create(array $data, array $appIdArr = [])
    {
        try {
            $item = null;
            \DB::transaction(function () use ($data, $appIdArr, &$item) {
                $item = $this->getNotificationModel()->create($data);
                $item->appManagements()->attach($appIdArr);
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $item;
    }

    /**
     * @param int $id
     * @param array $data
     * @param array $topicIds
     * @return PushNotification|null
     */
    public function update(int $id, array $data, array $topicIds = [])
    {
        try {
            $item = null;
            \DB::transaction(function () use ($id, $data, $topicIds, &$item) {
                $item = $this->getNotificationModel()->find($id);
                $item->update($data);
                $item->appManagements()->sync($topicIds);
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $item;
    }

    /**
     * @param int $page 當前頁數
     * @param int $perPage 每頁幾筆
     * @param array $orderBy 排序 [0=>columnName,1=>Desc]
     * @return Collection
     */
    public function getList(int $page, int $perPage, array $orderBy = []): Collection
    {
        $query = $this->getNotificationModel()->query();
        if (!is_null($orderBy)) {
            $query = $query->orderBy($orderBy[0], $orderBy[1]);
        }
        $query = $query->with([
            'appManagements' => function (BelongsToMany $query) {
                $query->select('app_management.name', 'app_management.id', 'app_management.mobile_device');
            }
        ]);

        return $query->forPage($page, $perPage)->get();
    }

    /**
     * @param int $id
     * @return PushNotification|null
     */
    public function find(int $id)
    {
        $item = $this->getNotificationModel()->find($id);

        return $item;
    }

    /**
     * @param array $ids
     * @return int
     */
    public function delete(array $ids)
    {
        try {
            $count = 0;
            $pushRelationRep = \App::make(PushNotificationAppManagementRep::class);
            \DB::transaction(function () use ($ids, &$count, $pushRelationRep) {
                $pushRelationRep->forceDeletePushNotification($ids);
                $count = $this->getNotificationModel()->destroy($ids);
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $count;
    }

    /**
     * @return Collection|static[]
     */
    public function total()
    {
        return $this->getNotificationModel()->get();
    }
}

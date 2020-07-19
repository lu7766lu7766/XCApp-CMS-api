<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/14
 * Time: 下午 04:24
 */

namespace Modules\AppAutomation\Repository;

use Illuminate\Database\Eloquent\Collection;
use Modules\AppAutomation\Entities\AppAutomation;
use Modules\Base\Util\LaravelLoggerUtil;

class AppAutomationRepo
{
    /**
     * 取得列表資訊
     * @param string|null $status
     * @param string|null $keyword
     * @param int $page
     * @param int $perpage
     * @return Collection|\Modules\AppAutomation\Entities\AppAutomation[]
     */
    public function getList(
        string $status = null,
        string $keyword = null,
        int $page = 1,
        int $perpage = 20
    ) {
        return $this->getListQuery($status, $keyword)
            ->with(['used'])
            ->forPage($page, $perpage)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * 取得列表總筆數
     * @param string|null $status
     * @param string|null $keyword
     * @return int
     */
    public function getTotal(string $status = null, string $keyword = null)
    {
        return $this->getListQuery($status, $keyword)->count();
    }

    /**
     * 取得單筆詳細資訊 by id
     * @param int $id
     * @return AppAutomation|null
     */
    public function getDetail(int $id)
    {
        return AppAutomation::with(['used'])->where('id', $id)
            ->first();
    }

    /**
     * 新增APP自動生成資料
     * @param array $params
     * @param int $fileId
     * @return AppAutomation|null
     */
    public function add(array $params, int $fileId)
    {
        $orm = null;
        try {
            \DB::transaction(function () use ($params, $fileId, &$orm) {
                $orm = app(AppAutomation::class);
                $orm->fill($params)->save();
                $orm->fileEnabled([$fileId]);
                $orm->load('used');
            });
        } catch (\Throwable $e) {
            $orm = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * 修改APP自動生成資料
     * @param int $id
     * @param array $params
     * @param int $fileId
     * @return AppAutomation|null
     */
    public function update(int $id, array $params, int $fileId)
    {
        $orm = null;
        try {
            \DB::transaction(function () use ($id, $params, $fileId, &$orm) {
                $orm = AppAutomation::find($id);
                if (!is_null($orm)) {
                    $orm->fill($params)->save();
                    $orm->forceSync([$fileId]);
                    $orm->load('used');
                }
            });
        } catch (\Throwable $e) {
            $orm = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * 修改APP自動生成資料 by uuid
     * @param string $uuid
     * @param array $params
     * @return AppAutomation|null
     */
    public function updateByUuid(string $uuid, array $params)
    {
        $orm = null;
        try {
            \DB::transaction(function () use ($uuid, $params, &$orm) {
                $orm = AppAutomation::query()->where('uuid', $uuid)->first();
                if (!is_null($orm)) {
                    $orm->fill($params)->save();
                    $orm->load('used');
                }
            });
        } catch (\Throwable $e) {
            $orm = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * 刪除APP自動生成資料
     * @param array $id
     * @return int
     */
    public function del(array $id)
    {
        $result = 0;
        try {
            \DB::transaction(function () use ($id, &$result) {
                $orm = AppAutomation::query()
                    ->whereIn('id', $id)
                    ->get();
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
     * 產生APP自動生成資料列表查詢語法
     * @param string|null $status
     * @param string|null $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function getListQuery(string $status = null, string $keyword = null)
    {
        $builder = AppAutomation::query();
        if (!is_null($status)) {
            $builder->where('status', $status);
        }
        if (!is_null($keyword)) {
            $builder->where('name', 'like', '%' . $keyword . '%');
        }

        return $builder;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/11
 * Time: 下午 04:54
 */

namespace Modules\AppManagement\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Util\LaravelLoggerUtil;

class PersonalRepo
{
    /**
     * @param int $accountId 帳號id
     * @param int $page 頁數
     * @param int $perpage 一頁幾筆
     * @param string|null $category 分類
     * @param string|null $mobileDevice 裝置
     * @param string|null $name 名稱
     * @param string|null $status
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function list(
        int $accountId,
        int $page = 1,
        int $perpage = 20,
        string $category = null,
        string $mobileDevice = null,
        string $name = null,
        string $status = null
    ) {
        $result = [];
        try {
            $query = AppManagementORM::query()->with([
                AppManagementORM::ACCOUNT_INFO => function (Relation $builder) {
                    $builder->select('id', 'account', 'display_name');
                }
            ])->whereHas(AppManagementORM::ACCOUNT_INFO, function (Builder $builder) {
                $builder->where('status', CommonStatusConstants::ENABLE);
            });
            if (!is_null($category)) {
                $query->where('category', $category);
            }
            if (!is_null($mobileDevice)) {
                $query->where('mobile_device', $mobileDevice);
            }
            if (!is_null($name)) {
                $query->where('name', 'like', '%' . $name . '%');
            }
            if (!is_null($status)) {
                $query->where('status', $status);
            }
            $result = $query->where('account_id', $accountId)
                ->forPage($page, $perpage)
                ->orderBy('id', 'DESC')
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param array $attribute
     * @return AppManagementORM|null
     */
    public function store(array $attribute)
    {
        $orm = null;
        try {
            $orm = new AppManagementORM();
            $orm->fill($attribute)->save();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * @param int $id
     * @param array $attribute
     * @param int $accountId
     * @return AppManagementORM|null
     */
    public function update(int $id, array $attribute, int $accountId)
    {
        $orm = null;
        try {
            $orm = AppManagementORM::where('account_id', $accountId)->find($id);
            if (!is_null($orm)) {
                $orm->fill($attribute)->save();
            }
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * @param array $id
     * @param int $accountId
     * @return int
     */
    public function delete(array $id, int $accountId)
    {
        $orm = null;
        try {
            $orm = AppManagementORM::where('account_id', $accountId)->whereIn('id', $id)->delete();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * @param int $accountId
     * @param string|null $category
     * @param string|null $mobileDevice
     * @param string|null $name
     * @param string|null $status
     * @return int
     */
    public function total(
        int $accountId,
        string $category = null,
        string $mobileDevice = null,
        string $name = null,
        string $status = null
    ) {
        $result = 0;
        try {
            $query = AppManagementORM::query()
                ->whereHas(AppManagementORM::ACCOUNT_INFO, function (Builder $builder) {
                    $builder->where('status', CommonStatusConstants::ENABLE);
                });
            if (!is_null($category)) {
                $query->where('category', $category);
            }
            if (!is_null($mobileDevice)) {
                $query->where('mobile_device', $mobileDevice);
            }
            if (!is_null($name)) {
                $query->where('name', 'like', '%' . $name . '%');
            }
            if (!is_null($status)) {
                $query->where('status', $status);
            }
            $result = $query->where('account_id', $accountId)->count();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * for 推播使用
     * @param int $accountId
     * @return array|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllTopic(int $accountId)
    {
        $result = [];
        try {
            $result = AppManagementORM::query()
                ->select('id', 'name')
                ->whereHas(AppManagementORM::ACCOUNT_INFO, function (Builder $builder) use ($accountId) {
                    $builder->where('id', $accountId)->where('status', CommonStatusConstants::ENABLE);
                })
                ->select('id', 'name', 'mobile_device')
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}

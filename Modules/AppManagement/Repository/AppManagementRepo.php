<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/14
 * Time: 下午 12:57
 */

namespace Modules\AppManagement\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Util\LaravelLoggerUtil;

class AppManagementRepo
{
    /**
     * @param string|null $category 分類
     * @param string|null $mobileDevice 裝置
     * @param string|null $name 名稱
     * @param string|null $status
     * @param int $page 頁數
     * @param int $perpage 一頁幾筆
     * @return array|Collection
     */
    public function list(
        string $category = null,
        string $mobileDevice = null,
        string $name = null,
        string $status = null,
        int $page = 1,
        int $perpage = 20
    ) {
        $result = [];
        try {
            $query = AppManagementORM::query()
                ->with([
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
            $result = $query->forPage($page, $perpage)->orderBy('id', 'DESC')->get();
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
     * @return AppManagementORM|null
     */
    public function update(int $id, array $attribute)
    {
        $orm = null;
        try {
            $orm = AppManagementORM::find($id);
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
     * @return int
     */
    public function delete(array $id)
    {
        $orm = null;
        try {
            $orm = AppManagementORM::destroy($id);
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $orm;
    }

    /**
     * @param string|null $category
     * @param string|null $mobileDevice
     * @param string|null $name
     * @param string|null $status
     * @return int
     */
    public function total(
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
            $result = $query->count();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * for 推播使用
     * @return array|Collection
     */
    public function getAllTopic()
    {
        $result = [];
        try {
            $result = AppManagementORM::query()
                ->whereHas(AppManagementORM::ACCOUNT_INFO, function (Builder $builder) {
                    $builder->where('status', CommonStatusConstants::ENABLE);
                })
                ->select('id', 'name', 'mobile_device')
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param array $ids
     * @return int
     */
    public function checkAppIds(array $ids)
    {
        $result = 0;
        try {
            $result = AppManagementORM::whereIn('id', $ids)->count();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string $code
     * @param int $accountId
     * @return AppManagementORM|null
     */
    public function findApp(string $code, int $accountId)
    {
        return AppManagementORM::where('code', $code)->where('account_id', $accountId)->first();
    }

    /**
     * @param string $code
     * @param int $accountId
     * @param string $deviceIdentify
     * @return AppManagementORM|null
     */
    public function createDeviceInfo(AppManagementORM $app, string $deviceIdentify)
    {
        try {
            $app->deviceInfo()->firstOrCreate(['identify' => $deviceIdentify]);
            $app->load('deviceInfo');
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
            $app = null;
        }

        return $app;
    }
}

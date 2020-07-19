<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/6/6
 * Time: 下午 01:59
 */

namespace Modules\IpManagement\Repository;

use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Modules\Base\Constants\MariaDBSQLStateConstants;
use Modules\Base\Exception\MariaDBDuplicateEntryException;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\IpManagement\Entities\IpManagement;

class IpManagementRepo
{
    /**
     * @param string|null $type
     * @param string|null $device
     * @param string|null $status
     * @param string|null $keyword
     * @param int $page
     * @param int $perpage
     * @return Collection|IpManagement[]
     */
    public function getList(
        string $type = null,
        string $device = null,
        string $status = null,
        string $keyword = null,
        int $page = 1,
        int $perpage = 20
    ) {
        return $this->getListQuery($type, $device, $status, $keyword)
            ->forPage($page, $perpage)
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    /**
     * @param string|null $type
     * @param string|null $device
     * @param string|null $status
     * @param string|null $keyword
     * @return int
     */
    public function getTotal(
        string $type = null,
        string $device = null,
        string $status = null,
        string $keyword = null
    ) {
        return $this->getListQuery($type, $device, $status, $keyword)->count();
    }

    /**
     * @param int $id
     * @return IpManagement|null
     */
    public function getDetail(int $id)
    {
        return IpManagement::find($id);
    }

    /**
     * 新增
     * @param array $params
     * @return IpManagement|null
     */
    public function add(array $params)
    {
        $result = null;
        try {
            $result = app(IpManagement::class);
            $result->fill($params)->save();
        } catch (QueryException $e) {
            if ($e->getCode() == MariaDBSQLStateConstants::DUPLICATE_ENTRY) {
                throw new MariaDBDuplicateEntryException($e->getSql(), $e->getBindings(), $e->getPrevious());
            }
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * 更新
     * @param int $id
     * @param array $params
     * @return IpManagement|null
     */
    public function update(int $id, array $params)
    {
        $result = null;
        try {
            $result = IpManagement::query()->where('id', $id)->first();
            if (!is_null($result)) {
                $result->fill($params)->save();
            }
        } catch (QueryException $e) {
            if ($e->getCode() == MariaDBSQLStateConstants::DUPLICATE_ENTRY) {
                throw new MariaDBDuplicateEntryException($e->getSql(), $e->getBindings(), $e->getPrevious());
            }
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        } catch (\Throwable $e) {
            $result = null;
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * 刪除
     * @param array $id
     * @return int
     */
    public function del(array $id)
    {
        $result = 0;
        try {
            $result = IpManagement::destroy($id);
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string|null $type
     * @param string|null $device
     * @param string|null $status
     * @return IpManagement[]|Collection
     */
    public function getAll(string $type = null, string $device = null, string $status = null)
    {
        return $this->getListQuery($type, $device, $status, null)->get();
    }

    /**
     * 產生ip管理列表查詢語法
     * @param string|null $type
     * @param string|null $device
     * @param string|null $status
     * @param string|null $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function getListQuery(
        string $type = null,
        string $device = null,
        string $status = null,
        string $keyword = null
    ) {
        $builder = IpManagement::query();
        if (!is_null($type)) {
            $builder->where('type', $type);
        }
        if (!is_null($device)) {
            $builder->where('device', $device);
        }
        if (!is_null($status)) {
            $builder->where('status', $status);
        }
        if (!is_null($keyword)) {
            $builder->where('ip', 'like', '%' . $keyword . '%');
        }

        return $builder;
    }
}

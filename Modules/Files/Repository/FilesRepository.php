<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/1
 * Time: 上午 11:30
 */

namespace Modules\Files\Repository;

use Illuminate\Database\Eloquent\Collection;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Files\Entities\Files;

class FilesRepository
{
    /**
     * @return Files
     */
    public function getModel()
    {
        return new Files();
    }

    /**
     * @param array $data
     * @return Files|null
     */
    public function create(array $data)
    {
        $result = null;
        try {
            $result = $this->getModel()->create($data);
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $id
     * @return Files|null
     */
    public function find(int $id)
    {
        return $this->getModel()->find($id);
    }

    /**
     * @param array $ids
     * @return Collection|Files[]
     */
    public function findFiles(array $ids)
    {
        return $this->getModel()->whereIn('id', $ids)->get();
    }

    /**
     * @param string $time
     * @return Collection|Files[]
     */
    public function getExpiredFiles(string $time)
    {
        try {
            $item = $this->getModel()
                ->where('updated_at', '<=', $time)
                ->whereDoesntHave('fileUsed')
                ->get();
        } catch (\Throwable $e) {
            $item = collect();
            LaravelLoggerUtil::loggerException($e);
        }

        return $item;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: House
 * Date: 2018/11/1
 * Time: 下午 02:17
 */

namespace Modules\Account\Bridge;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Contract\IRoleProvider;
use Modules\Account\Entities\Account;
use Modules\Base\Util\LaravelLoggerUtil;

class RoleModelBridge implements IRoleProvider
{
    /**
     * @param string $code
     * @return Model
     */
    public function getByCode(string $code)
    {
        $result = null;
        try {
            $result = Account::roleModel()->where('code', $code)->first();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param array $ids
     * @return Collection
     */
    public function getByIds(array $ids)
    {
        $result = collect();
        try {
            $result = Account::roleModel()->whereIn('id', $ids)->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}

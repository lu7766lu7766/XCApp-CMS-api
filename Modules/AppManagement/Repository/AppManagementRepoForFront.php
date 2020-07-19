<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/17
 * Time: 上午 11:08
 */

namespace Modules\AppManagement\Repository;

use Modules\AppManagement\Entities\AppManagementORM;
use Modules\Base\Util\LaravelLoggerUtil;

class AppManagementRepoForFront
{
    /**
     * @param string $code
     * @param int $accountID
     * @return AppManagementORM|null
     */
    public function find(string $code, int $accountID)
    {
        $result = null;
        try {
            $result = AppManagementORM::where('code', $code)
                ->where('account_id', $accountID)->first();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}

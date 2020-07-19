<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/17
 * Time: 上午 10:54
 */

namespace Modules\AppManagement\Service;

use Illuminate\Auth\AuthManager;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\AppManagement\Http\Requests\AppManagementListForFrontRequest;
use Modules\AppManagement\Repository\AppManagementRepoForFront;
use Modules\Base\Support\Traits\Pattern\Singleton;

class AppManagementServiceForFront
{
    use Singleton;

    /**
     * @param AppManagementListForFrontRequest $handel
     * @param AuthManager $auth
     * @return AppManagementORM|null
     */
    public function getInfo(AppManagementListForFrontRequest $handel, AuthManager $auth)
    {
        $orm = app(AppManagementRepoForFront::class)->find(
            $handel->getCode(),
            $auth->guard()->user()->getAuthIdentifier()
        );

        return $orm;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/14
 * Time: 下午 06:07
 */

namespace Modules\AppManagement\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\AppManagement\Http\Requests\AppManagementListForFrontRequest;
use Modules\AppManagement\Service\AppManagementServiceForFront;
use Modules\Base\Http\Controllers\BaseController;

class AppManagementForFrontController extends BaseController
{
    /**
     * 提供app裝置取得後台app管理資訊
     * @param $code
     * @param AuthManager $auth
     * @return AppManagementORM|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function appInfo($code, AuthManager $auth)
    {
        return AppManagementServiceForFront::getInstance()->getInfo(
            AppManagementListForFrontRequest::getHandle(['code' => $code]),
            $auth
        );
    }
}

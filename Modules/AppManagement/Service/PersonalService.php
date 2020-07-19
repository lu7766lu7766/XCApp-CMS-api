<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/11
 * Time: 下午 04:51
 */

namespace Modules\AppManagement\Service;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\AppManagement\Http\Requests\AppManagementDeleteRequest;
use Modules\AppManagement\Http\Requests\AppManagementDeviceStoreRequest;
use Modules\AppManagement\Http\Requests\AppManagementEditRequest;
use Modules\AppManagement\Http\Requests\AppManagementListRequest;
use Modules\AppManagement\Repository\AppManagementRepo;
use Modules\AppManagement\Repository\PersonalRepo;
use Modules\Base\Constants\ApiCode\CommonCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Traits\Pattern\Singleton;

/**
 * 個人App管理
 * Class PersonalService
 * @package Modules\AppManagement\Service
 */
class PersonalService
{
    use Singleton;
    /** @var Authenticatable */
    private $user;

    /**
     * @param Authenticatable $user
     */
    public function init(Authenticatable $user)
    {
        $this->user = $user;
    }

    /**
     * @param AppManagementListRequest $handle
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function list(AppManagementListRequest $handle)
    {
        return app(PersonalRepo::class)->list(
            $this->user->getAuthIdentifier(),
            $handle->getPage(),
            $handle->getPerpage(),
            $handle->getCategory(),
            $handle->getMobileDevice(),
            $handle->getName(),
            $handle->getStatus()
        );
    }

    /**
     * @param AppManagementEditRequest $handle
     * @return AppManagementORM
     */
    public function store(AppManagementEditRequest $handle)
    {
        $attribute = $this->transferToAttribute($handle);

        return app(PersonalRepo::class)->store($attribute);
    }

    /**
     * @param AppManagementEditRequest $handle
     * @return AppManagementORM
     */
    public function update(AppManagementEditRequest $handle)
    {
        $attribute = $this->transferToAttribute($handle);

        return app(PersonalRepo::class)->update(
            $handle->getId(),
            $attribute,
            $this->user->getAuthIdentifier()
        );
    }

    /**
     * @param AppManagementDeleteRequest $handle
     * @return AppManagementORM
     */
    public function delete(AppManagementDeleteRequest $handle)
    {
        return app(PersonalRepo::class)->delete($handle->getId(), $this->user->getAuthIdentifier());
    }

    /**
     * @param AppManagementListRequest $handel
     * @return int
     */
    public function total(AppManagementListRequest $handel)
    {
        return app(PersonalRepo::class)->total(
            $this->user->getAuthIdentifier(),
            $handel->getCategory(),
            $handel->getMobileDevice(),
            $handel->getName(),
            $handel->getStatus()
        );
    }

    /**
     * @param AppManagementEditRequest $handle
     * @return array
     */
    private function transferToAttribute(AppManagementEditRequest $handle)
    {
        return [
            'mobile_device'    => $handle->getMobileDevice(),
            'code'             => $handle->getCode(),
            'name'             => $handle->getName(),
            'category'         => $handle->getCategory(),
            'redirect_switch'  => $handle->getRedirectSwitch(),
            'redirect_url'     => $handle->getRedirectUrl(),
            'update_switch'    => $handle->getUpdateSwitch(),
            'update_url'       => $handle->getUpdateUrl(),
            'update_content'   => $handle->getUpdateContent(),
            'qq_id'            => $handle->getQQid(),
            'wechat_id'        => $handle->getWechatId(),
            'customer_service' => $handle->getCustomerService(),
            'status'           => $handle->getStatus(),
            'topic_id'         => $handle->getTopicId(),
            'account_id'       => $this->user->getAuthIdentifier(),
            'push_path'        => $handle->getPushPath(),
            'app_version'      => $handle->getAppVersion(),
            'app_url'          => $handle->getAppUrl(),
        ];
    }

    /**
     * @param AppManagementDeviceStoreRequest $request
     * @return AppManagementORM
     * @throws ApiErrorCodeException
     */
    public function deviceStore(AppManagementDeviceStoreRequest $request)
    {
        $repo = app(AppManagementRepo::class);
        $app = $repo->findApp(
            $request->getCode(),
            $this->user->getAuthIdentifier()
        );
        if (is_null($app)) {
            throw new ApiErrorCodeException([CommonCodeConstants::MODEL_NOT_FOUND]);
        }
        $app = $repo->createDeviceInfo($app, $request->getIdentify());
        if (is_null($app)) {
            throw new ApiErrorCodeException([CommonCodeConstants::CREATE_FAIL]);
        }

        return $app;
    }
}

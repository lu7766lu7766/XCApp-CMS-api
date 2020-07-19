<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/14
 * Time: 下午 12:16
 */

namespace Modules\AppManagement\Service;

use Modules\AppManagement\Constants\CategoryConstants;
use Modules\AppManagement\Constants\MobileDeviceConstants;
use Modules\AppManagement\Constants\PushPathConstants;
use Modules\AppManagement\Constants\StatusConstants;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\AppManagement\Http\Requests\AppManagementDeleteRequest;
use Modules\AppManagement\Http\Requests\AppManagementEditRequest;
use Modules\AppManagement\Http\Requests\AppManagementListRequest;
use Modules\AppManagement\Repository\AppManagementRepo;
use Modules\Base\Support\Traits\Pattern\Singleton;

class AppManagementService
{
    use Singleton;

    /**
     * @param AppManagementListRequest $handle
     * @return array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function list(AppManagementListRequest $handle)
    {
        return app(AppManagementRepo::class)->list(
            $handle->getCategory(),
            $handle->getMobileDevice(),
            $handle->getName(),
            $handle->getStatus(),
            $handle->getPage(),
            $handle->getPerpage()
        );
    }

    /**
     * @param AppManagementEditRequest $handle
     * @return AppManagementORM
     * @throws \Throwable
     */
    public function store(AppManagementEditRequest $handle)
    {
        $attribute = $this->transferToAttribute($handle);

        return app(AppManagementRepo::class)->store($attribute);
    }

    /**
     * @param AppManagementEditRequest $handle
     * @return AppManagementORM
     * @throws \Throwable
     */
    public function update(AppManagementEditRequest $handle)
    {
        $attribute = $this->transferToAttribute($handle);

        return app(AppManagementRepo::class)->update($handle->getId(), $attribute);
    }

    /**
     * @param AppManagementDeleteRequest $handle
     * @return AppManagementORM
     * @throws \Throwable
     */
    public function delete(AppManagementDeleteRequest $handle)
    {
        return app(AppManagementRepo::class)->delete($handle->getId());
    }

    /**
     * @param AppManagementListRequest $handle
     * @return int
     */
    public function total(AppManagementListRequest $handle)
    {
        return app(AppManagementRepo::class)->total(
            $handle->getCategory(),
            $handle->getMobileDevice(),
            $handle->getName(),
            $handle->getStatus()
        );
    }

    /**
     * @return array
     */
    public function options()
    {
        return [
            'category'  => CategoryConstants::enum(),
            'device'    => MobileDeviceConstants::enum(),
            'status'    => StatusConstants::enum(),
            'push_path' => PushPathConstants::enum()
        ];
    }

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
            'push_path'        => $handle->getPushPath(),
            'app_version'      => $handle->getAppVersion(),
            'app_url'          => $handle->getAppUrl(),
        ];
    }
}

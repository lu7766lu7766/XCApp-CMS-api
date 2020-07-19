<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/2
 * Time: 下午 01:45
 */

namespace Modules\WebLink\Service;

use Modules\AppManagement\Repository\AppManagementRepo;
use Modules\Base\Constants\ApiCode\WebLink70000\WebLinkCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\WebLink\Http\Requests\WebLinkEditRequest;
use Modules\WebLink\Http\Requests\WebLinkGetIdRequest;
use Modules\WebLink\Http\Requests\WebLinkListRequest;
use Modules\WebLink\Repository\CategoryRepo;
use Modules\WebLink\Repository\WebLinkRepo;

class WebLinkService
{
    /**
     * @param WebLinkListRequest $handle
     * @return array|\Illuminate\Support\Collection
     */
    public function list(WebLinkListRequest $handle)
    {
        return app(WebLinkRepo::class)->list(
            $handle->getPage(),
            $handle->getPerpage(),
            $handle->getName(),
            $handle->getCategoryId()
        );
    }

    /**
     * @param WebLinkEditRequest $handle
     * @return \Modules\WebLink\Entities\WebLinkOrm|null
     * @throws ApiErrorCodeException
     */
    public function store(WebLinkEditRequest $handle)
    {
        if ($handle->getApp() && !$this->checkAppIds($handle->getApp())) {
            throw new ApiErrorCodeException([WebLinkCodeConstants::APP_ID_NOT_EXIST]);
        }
        $attribute = [
            'name'        => $handle->getName(),
            'category_id' => $handle->getCategoryId(),
            'url_link'    => $handle->getUrl(),
            'status'      => $handle->getStatus(),
        ];

        return app(WebLinkRepo::class)->store($attribute, $handle->getApp(), $handle->getImageId());
    }

    /**
     * @param WebLinkEditRequest $handle
     * @return \Modules\WebLink\Entities\WebLinkOrm|null
     * @throws ApiErrorCodeException
     */
    public function update(WebLinkEditRequest $handle)
    {
        if ($handle->getApp() && !$this->checkAppIds($handle->getApp())) {
            throw new ApiErrorCodeException([WebLinkCodeConstants::APP_ID_NOT_EXIST]);
        }
        $attribute = [
            'name'        => $handle->getName(),
            'category_id' => $handle->getCategoryId(),
            'url_link'    => $handle->getUrl(),
            'status'      => $handle->getStatus(),
        ];

        return app(WebLinkRepo::class)->update($attribute, $handle->getId(), $handle->getApp(), $handle->getImageId());
    }

    /**
     * @param WebLinkGetIdRequest $handle
     * @return int
     */
    public function delete(WebLinkGetIdRequest $handle)
    {
        return app(WebLinkRepo::class)->delete($handle->getId());
    }

    /**
     * @param WebLinkListRequest $handle
     * @return int
     */
    public function total(WebLinkListRequest $handle)
    {
        return app(WebLinkRepo::class)->total(
            $handle->getName(),
            $handle->getCategoryId()
        );
    }

    /**
     * @return array
     */
    public function options()
    {
        return [
            'category' => app(CategoryRepo::class)->allCategory(),
            'app_list' => app(AppManagementRepo::class)->getAllTopic()
        ];
    }

    /**
     * 檢查app id是否存在
     * @param array $ids
     * @return int
     */
    protected function checkAppIds(array $ids)
    {
        $result = false;
        $checkApp = app(AppManagementRepo::class)->checkAppIds($ids);
        if ($checkApp == count($ids)) {
            $result = true;
        }

        return $result;
    }
}

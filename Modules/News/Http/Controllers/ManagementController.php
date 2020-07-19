<?php

namespace Modules\News\Http\Controllers;

use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Files\Service\UploadFilesService;
use Modules\News\Http\Requests\Management\ManagementDeleteRequest;
use Modules\News\Http\Requests\Management\ManagementEditRequest;
use Modules\News\Http\Requests\Management\ManagementListRequest;
use Modules\News\Http\Requests\Management\ManagementStoreRequest;
use Modules\News\Http\Requests\Management\ManagementTotalRequest;
use Modules\News\Http\Requests\Management\ManagementUpdateRequest;
use Modules\News\Http\Requests\Management\ManagementUploadRequest;
use Modules\News\Repository\CategoryRepository;
use Modules\News\Service\ManagementService;

class ManagementController extends BaseController
{
    /**
     * @param ManagementListRequest $request
     * @return array
     */
    public function index(ManagementListRequest $request)
    {
        return ManagementService::getInstance()->getList($request);
    }

    /**
     * 獲取 category 列表
     * @return array
     */
    public function categoryList()
    {
        return app(CategoryRepository::class)->getCategory()->toArray();
    }

    /**
     * @param int $id
     * @return \Modules\News\Entities\NewsManagement|null
     * @throws ApiErrorCodeException
     */
    public function info(int $id)
    {
        return ManagementService::getInstance()->findFullInfo(ManagementEditRequest::getHandle(['id' => $id]));
    }

    /**
     * @param ManagementStoreRequest $request
     * @return \Modules\News\Entities\NewsManagement|null
     * @throws ApiErrorCodeException
     */
    public function store(ManagementStoreRequest $request)
    {
        return ManagementService::getInstance()->store($request);
    }

    /**
     * @param ManagementUpdateRequest $request
     * @return \Modules\News\Entities\NewsManagement|null
     * @throws ApiErrorCodeException
     */
    public function update(ManagementUpdateRequest $request)
    {
        return ManagementService::getInstance()->update($request);
    }

    /**
     * @param ManagementDeleteRequest $request
     * @return array
     */
    public function delete(ManagementDeleteRequest $request)
    {
        return ManagementService::getInstance()->delete($request);
    }

    /**
     * @param ManagementUploadRequest $request
     * @return array
     * @throws ApiErrorCodeException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function uploadFile(ManagementUploadRequest $request)
    {
        $item = UploadFilesService::uploadFormHttp($request->getRequestKeyAttr())->getItem();
        if (is_null($item)) {
            throw new ApiErrorCodeException([NewsCodeConstants::UPLOAD_FILE_FAIL]);
        }

        return $item->toArray();
    }

    /**
     * @param ManagementTotalRequest $request
     * @return array
     */
    public function total(ManagementTotalRequest $request)
    {
        return ManagementService::getInstance()->total($request);
    }
}

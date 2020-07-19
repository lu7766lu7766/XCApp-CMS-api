<?php

namespace Modules\News\Http\Controllers;

use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Files\Service\UploadFilesService;
use Modules\News\Http\Requests\Category\CategoryDeleteRequest;
use Modules\News\Http\Requests\Category\CategoryEditRequest;
use Modules\News\Http\Requests\Category\CategoryListRequest;
use Modules\News\Http\Requests\Category\CategoryStoreRequest;
use Modules\News\Http\Requests\Category\CategoryTotalRequest;
use Modules\News\Http\Requests\Category\CategoryUpdateRequest;
use Modules\News\Http\Requests\Category\CategoryUploadImageRequest;
use Modules\News\Service\CategoryService;

class CategoryController extends BaseController
{
    /**
     * @param CategoryListRequest $request
     * @return array
     */
    public function index(CategoryListRequest $request)
    {
        return CategoryService::getInstance()->list($request);
    }

    /**
     * @param CategoryStoreRequest $request
     * @return \Modules\News\Entities\NewsCategory|null
     * @throws ApiErrorCodeException
     */
    public function store(CategoryStoreRequest $request)
    {
        return CategoryService::getInstance()->store($request);
    }

    /**
     * @param $id
     * @return \Modules\News\Entities\NewsCategory|null
     * @throws ApiErrorCodeException
     */
    public function info($id)
    {
        return CategoryService::getInstance()->info(CategoryEditRequest::getHandle(['id' => $id]));
    }

    /**
     * @param CategoryUpdateRequest $request
     * @return \Modules\News\Entities\NewsCategory|null
     * @throws ApiErrorCodeException
     */
    public function update(CategoryUpdateRequest $request)
    {
        return CategoryService::getInstance()->update($request);
    }

    /**
     * @param CategoryDeleteRequest $request
     * @return array
     * @throws ApiErrorCodeException
     */
    public function delete(CategoryDeleteRequest $request)
    {
        return CategoryService::getInstance()->delete($request);
    }

    /**
     * @param CategoryTotalRequest $request
     * @return array
     */
    public function total(CategoryTotalRequest $request)
    {
        return CategoryService::getInstance()->total($request);
    }

    /**
     * @param CategoryUploadImageRequest $request
     * @return array
     * @throws ApiErrorCodeException
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function uploadImage(CategoryUploadImageRequest $request)
    {
        $item = UploadFilesService::uploadFormHttp($request->getRequestKeyAttr())->getItem();
        if (is_null($item)) {
            throw new ApiErrorCodeException([NewsCodeConstants::UPLOAD_FILE_FAIL]);
        }

        return $item->toArray();
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/2
 * Time: 上午 11:05
 */

namespace Modules\WebLink\Service;

use Modules\Base\Constants\ApiCode\WebLink70000\WebLinkCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\WebLink\Http\Requests\CategoryEditRequest;
use Modules\WebLink\Http\Requests\CategoryGetIdRequest;
use Modules\WebLink\Http\Requests\CategoryListRequest;
use Modules\WebLink\Repository\CategoryRepo;
use Modules\WebLink\Repository\WebLinkRepo;

class CategoryService
{
    /**
     * @param CategoryListRequest $handle
     * @return array|\Illuminate\Support\Collection
     */
    public function list(CategoryListRequest $handle)
    {
        return app(CategoryRepo::class)->list(
            $handle->getPage(),
            $handle->getPerpage(),
            $handle->getName()
        );
    }

    /**
     * @param CategoryEditRequest $handle
     * @return \Modules\WebLink\Entities\CategoryOrm|null
     */
    public function store(CategoryEditRequest $handle)
    {
        $attribute = [
            'name'   => $handle->getName(),
            'status' => $handle->getStatus(),
        ];

        return app(CategoryRepo::class)->store($attribute, $handle->getImageId());
    }

    /**
     * @param CategoryEditRequest $handle
     * @return \Modules\WebLink\Entities\CategoryOrm|null
     */
    public function update(CategoryEditRequest $handle)
    {
        $attribute = [
            'name'   => $handle->getName(),
            'status' => $handle->getStatus(),
        ];

        return app(CategoryRepo::class)->update($attribute, $handle->getId(), $handle->getImageId());
    }

    /**
     * @param CategoryGetIdRequest $handle
     * @return int|null
     * @throws ApiErrorCodeException
     */
    public function delete(CategoryGetIdRequest $handle)
    {
        $categoryInsideData = $this->checkCategoryInsideData($handle->getId());
        if ($categoryInsideData) {
            throw new ApiErrorCodeException([WebLinkCodeConstants::CATEGORY_HAVE_WEB_LINK_DATA_INSIDE]);
        }

        return app(CategoryRepo::class)->delete($handle->getId());
    }

    /**
     * @param CategoryListRequest $handle
     * @return int
     */
    public function total(CategoryListRequest $handle)
    {
        return app(CategoryRepo::class)->total(
            $handle->getName()
        );
    }

    /**
     * 檢查分類下有無資料
     * @param array $ids
     * @return int
     */
    protected function checkCategoryInsideData(array $ids)
    {
        return app(WebLinkRepo::class)->checkCategoryInsideData($ids);
    }
}

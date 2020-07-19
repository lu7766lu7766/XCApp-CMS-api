<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/28
 * Time: 下午 05:56
 */

namespace Modules\News\Service;

use Modules\Base\Constants\ApiCode\CommonCodeConstants;
use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\News\Http\Requests\Category\CategoryDeleteRequest;
use Modules\News\Http\Requests\Category\CategoryEditRequest;
use Modules\News\Http\Requests\Category\CategoryListRequest;
use Modules\News\Http\Requests\Category\CategoryStoreRequest;
use Modules\News\Http\Requests\Category\CategoryTotalRequest;
use Modules\News\Http\Requests\Category\CategoryUpdateRequest;
use Modules\News\Repository\CategoryRepository;
use Modules\News\Repository\ManagementRepository;

class CategoryService
{
    use Singleton;
    /**
     * @var CategoryRepository
     */
    private $rep;

    /**
     * CategoryService constructor.
     */
    public function __construct()
    {
        $this->rep = app(CategoryRepository::class);
    }

    /**
     * @param CategoryListRequest $request
     * @return array
     */
    public function list(CategoryListRequest $request)
    {
        return $this->rep->getList(
            $request->getPage(),
            $request->getPerPage(),
            $request->getSearch()
        )->toArray();
    }

    /**
     * @param CategoryStoreRequest $request
     * @return \Modules\News\Entities\NewsCategory
     * @throws ApiErrorCodeException
     */
    public function store(CategoryStoreRequest $request)
    {
        $data = [
            'name'   => $request->getName(),
            'status' => $request->getStatus(),
        ];
        $this->checkNameExist($request->getName());
        $item = $this->rep->create($data, $request->getImageId());
        if (is_null($item)) {
            throw new ApiErrorCodeException([]);
        }

        return $item;
    }

    /**
     * @param CategoryEditRequest $request
     * @return \Modules\News\Entities\NewsCategory
     * @throws ApiErrorCodeException
     */
    public function info(CategoryEditRequest $request)
    {
        $item = $this->rep->findFullInfo($request->getId());
        if (is_null($item)) {
            throw  new ApiErrorCodeException([CommonCodeConstants::MODEL_NOT_FOUND]);
        }

        return $item;
    }

    /**
     * @param CategoryDeleteRequest $request
     * @return array
     * @throws ApiErrorCodeException
     */
    public function delete(CategoryDeleteRequest $request)
    {
        //新聞管理存在時,不進行刪除
        $this->checkManagementExist($request->getIds());

        return ['count' => $this->rep->destroy($request->getIds())];
    }

    /**
     * @param CategoryTotalRequest $request
     * @return array
     */
    public function total(CategoryTotalRequest $request)
    {
        return ['total' => $this->rep->total($request->getSearch())];
    }

    /**
     * @param CategoryUpdateRequest $request
     * @return \Modules\News\Entities\NewsCategory|null
     * @throws ApiErrorCodeException
     */
    public function update(CategoryUpdateRequest $request)
    {
        $date = [
            'name'   => $request->getName(),
            'status' => $request->getStatus(),
        ];
        $this->checkNameExist($request->getName(), $request->getId());
        $item = $this->rep->update($request->getId(), $date, $request->getImageId());
        if (is_null($item)) {
            throw new ApiErrorCodeException([CommonCodeConstants::UPDATE_FAIL]);
        }

        return $item;
    }

    /**
     * 當category 類別已被新增,則不能重複新增
     * @param $name
     * @throws ApiErrorCodeException
     */
    private function checkNameExist($name, int $id = null)
    {
        $exist = $this->rep->findNameExcept($name, $id);
        if ($exist) {
            throw  new ApiErrorCodeException([NewsCodeConstants::CATEGORY_NAME_IS_EXIST]);
        }
    }

    /**
     * 確認 新聞管理 是否存在
     * @param array $ids
     * @throws ApiErrorCodeException
     */
    private function checkManagementExist(array $ids)
    {
        $managementRep = \App::make(ManagementRepository::class);
        $exist = $managementRep->findCategory($ids);
        if ($exist) {
            throw  new ApiErrorCodeException([NewsCodeConstants::NEWS_MANAGEMENT_IS_EXIST]);
        }
    }
}

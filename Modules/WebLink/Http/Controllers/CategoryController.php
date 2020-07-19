<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/1
 * Time: 下午 02:07
 */

namespace Modules\WebLink\Http\Controllers;

use Modules\Base\Http\Controllers\BaseController;
use Modules\WebLink\Http\Requests\CategoryEditRequest;
use Modules\WebLink\Http\Requests\CategoryGetIdRequest;
use Modules\WebLink\Http\Requests\CategoryListRequest;
use Modules\WebLink\Service\CategoryService;

class CategoryController extends BaseController
{
    /**
     * @param CategoryListRequest $request
     * @return array|\Illuminate\Support\Collection
     */
    public function list(CategoryListRequest $request)
    {
        return app(CategoryService::class)->list($request);
    }

    /**
     * @param CategoryEditRequest $request
     * @return \Modules\WebLink\Entities\CategoryOrm|null
     */
    public function store(CategoryEditRequest $request)
    {
        return app(CategoryService::class)->store($request);
    }

    /**
     * @param CategoryEditRequest $request
     * @return \Modules\WebLink\Entities\CategoryOrm|null
     */
    public function update(CategoryEditRequest $request)
    {
        return app(CategoryService::class)->update($request);
    }

    /**
     * @param CategoryGetIdRequest $request
     * @return int|null
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function delete(CategoryGetIdRequest $request)
    {
        return app(CategoryService::class)->delete($request);
    }

    /**
     * @param CategoryListRequest $request
     * @return int
     */
    public function total(CategoryListRequest $request)
    {
        return app(CategoryService::class)->total($request);
    }
}

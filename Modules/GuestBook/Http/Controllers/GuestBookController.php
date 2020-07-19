<?php

namespace Modules\GuestBook\Http\Controllers;

use Illuminate\Support\Collection;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Http\Controllers\BaseController;
use Modules\GuestBook\Entities\GuestBook;
use Modules\GuestBook\Http\Requests\GuestBookDeleteRequest;
use Modules\GuestBook\Http\Requests\GuestBookInfoRequest;
use Modules\GuestBook\Http\Requests\GuestBookListRequest;
use Modules\GuestBook\Http\Requests\GuestBookTotalRequest;
use Modules\GuestBook\Service\GuestBookService;

class GuestBookController extends BaseController
{
    /**
     * @param GuestBookListRequest $request
     * @return Collection|GuestBook[]
     */
    public function index(GuestBookListRequest $request)
    {
        return GuestBookService::getInstance()->list($request);
    }

    /**
     * @param GuestBookInfoRequest $request
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function info(GuestBookInfoRequest $request)
    {
        return GuestBookService::getInstance()->info($request);
    }

    /**
     * @param GuestBookDeleteRequest $request
     * @return array
     */
    public function delete(GuestBookDeleteRequest $request)
    {
        return GuestBookService::getInstance()->delete($request);
    }

    /**
     * @param GuestBookTotalRequest $request
     * @return array
     */
    public function total(GuestBookTotalRequest $request)
    {
        return GuestBookService::getInstance()->total($request);
    }
}

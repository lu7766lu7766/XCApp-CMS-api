<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/6
 * Time: 下午 02:11
 */

namespace Modules\GuestBook\Service;

use Illuminate\Support\Collection;
use Modules\Base\Constants\ApiCode\CommonCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\GuestBook\Entities\GuestBook;
use Modules\GuestBook\Http\Requests\GuestBookDeleteRequest;
use Modules\GuestBook\Http\Requests\GuestBookInfoRequest;
use Modules\GuestBook\Http\Requests\GuestBookListRequest;
use Modules\GuestBook\Http\Requests\GuestBookTotalRequest;
use Modules\GuestBook\Repository\GuestBookRepository;

class GuestBookService
{
    use Singleton;

    /**
     * @param GuestBookListRequest $request
     * @return Collection|GuestBook[]
     */
    public function list(GuestBookListRequest $request)
    {
        return app(GuestBookRepository::class)->getList(
            $request->getPage(),
            $request->getPerpage(),
            $request->getSearch()
        );
    }

    /**
     * @param GuestBookInfoRequest $request
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function info(GuestBookInfoRequest $request)
    {
        $item = app(GuestBookRepository::class)->findFullInfo(
            $request->getId(),
            $request->getPage(),
            $request->getPerPage()
        );
        if (is_null($item)) {
            throw new ApiErrorCodeException([CommonCodeConstants::MODEL_NOT_FOUND]);
        }

        return $item;
    }

    /**
     * @param GuestBookDeleteRequest $request
     * @return array
     */
    public function delete(GuestBookDeleteRequest $request)
    {
        $count = app(GuestBookRepository::class)->delete($request->getIds());

        return ['count' => $count];
    }

    /**
     * @param GuestBookTotalRequest $request
     * @return array
     */
    public function total(GuestBookTotalRequest $request)
    {
        return ['total' => app(GuestBookRepository::class)->total($request->getSearch())];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/11/6
 * Time: 下午 04:57
 */

namespace Modules\GuestBook\Service;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Base\Constants\ApiCode\CommonCodeConstants;
use Modules\Base\Constants\ApiCode\GuestBook80000\GuestBookCodeConstants;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\GuestBook\Entities\GuestBook;
use Modules\GuestBook\Http\Requests\GuestBookFrontCommentRequest;
use Modules\GuestBook\Http\Requests\GuestBookFrontDeleteRequest;
use Modules\GuestBook\Http\Requests\GuestBookFrontReactionRequest;
use Modules\GuestBook\Http\Requests\GuestBookFrontStoreRequest;
use Modules\GuestBook\Http\Requests\GuestBookFrontUpdateRequest;
use Modules\GuestBook\Http\Requests\GuestBookInfoRequest;
use Modules\GuestBook\Repository\GuestBookRepository;

class GuestBookFrontService
{
    use Singleton;

    /**
     * @param GuestBookFrontStoreRequest $request
     * @param Authenticatable $user
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function store(GuestBookFrontStoreRequest $request, Authenticatable $user)
    {
        $data = [
            'title'      => $request->getTitle(),
            'content'    => $request->getGuestBookContent(),
            'account_id' => $user->getAuthIdentifier()
        ];
        $item = app(GuestBookRepository::class)->create($data);
        if (is_null($item)) {
            throw new ApiErrorCodeException([CommonCodeConstants::CREATE_FAIL]);
        }

        return $item;
    }

    /**
     * @param GuestBookFrontUpdateRequest $request
     * @param Authenticatable $user
     * @return array
     * @throws ApiErrorCodeException
     */
    public function update(GuestBookFrontUpdateRequest $request, Authenticatable $user)
    {
        $item = app(GuestBookRepository::class)
            ->findAuthor($request->getId(), $user->getAuthIdentifier());
        if (is_null($item)) {
            throw  new ApiErrorCodeException([GuestBookCodeConstants::HAVE_NO_AUTHORITY_TO_GET_UPDATE]);
        }
        $data = [
            'title'   => $request->getTitle(),
            'content' => $request->getGuestBookContent(),
        ];
        $success = app(GuestBookRepository::class)->update($item, $data);

        return ['success' => $success];
    }

    /**
     * @param GuestBookFrontDeleteRequest $request
     * @param Authenticatable $user
     * @return array
     * @throws ApiErrorCodeException
     */
    public function delete(GuestBookFrontDeleteRequest $request, Authenticatable $user)
    {
        $item = app(GuestBookRepository::class)
            ->findAuthor($request->getId(), $user->getAuthIdentifier());
        if (is_null($item)) {
            throw  new ApiErrorCodeException([GuestBookCodeConstants::HAVE_NO_AUTHORITY_TO_GET_DELETE]);
        }

        return ['count' => app(GuestBookRepository::class)->delete([$item->getKey()])];
    }

    /**
     * @param GuestBookInfoRequest $request
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function info(GuestBookInfoRequest $request)
    {
        $item = app(GuestBookRepository::class)->findFullInfoForUser(
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
     * @param GuestBookFrontCommentRequest $request
     * @param Authenticatable $user
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function comment(GuestBookFrontCommentRequest $request, Authenticatable $user)
    {
        $item = app(GuestBookRepository::class)->addComment(
            $request->getId(),
            $user->getAuthIdentifier(),
            $request->getMessage()
        );
        if (is_null($item)) {
            throw new ApiErrorCodeException([CommonCodeConstants::MODEL_NOT_FOUND]);
        }

        return $item;
    }

    /**
     * @param GuestBookFrontReactionRequest $request
     * @param Authenticatable $user
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function like(GuestBookFrontReactionRequest $request, Authenticatable $user)
    {
        $item = app(GuestBookRepository::class)->like($request->getId(), $user->getAuthIdentifier());
        if (is_null($item)) {
            throw new ApiErrorCodeException([CommonCodeConstants::MODEL_NOT_FOUND]);
        }

        return $item;
    }

    /**
     * @param GuestBookFrontReactionRequest $request
     * @param Authenticatable $user
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function dislike(GuestBookFrontReactionRequest $request, Authenticatable $user)
    {
        $item = app(GuestBookRepository::class)->dislike(
            $request->getId(),
            $user->getAuthIdentifier()
        );
        if (is_null($item)) {
            throw new ApiErrorCodeException([CommonCodeConstants::MODEL_NOT_FOUND]);
        }

        return $item;
    }
}

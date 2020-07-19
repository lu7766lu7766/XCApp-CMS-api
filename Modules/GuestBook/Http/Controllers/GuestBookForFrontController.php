<?php

namespace Modules\GuestBook\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Base\Http\Controllers\BaseController;
use Modules\GuestBook\Entities\GuestBook;
use Modules\GuestBook\Http\Requests\GuestBookFrontCommentRequest;
use Modules\GuestBook\Http\Requests\GuestBookFrontDeleteRequest;
use Modules\GuestBook\Http\Requests\GuestBookFrontReactionRequest;
use Modules\GuestBook\Http\Requests\GuestBookFrontStoreRequest;
use Modules\GuestBook\Http\Requests\GuestBookFrontUpdateRequest;
use Modules\GuestBook\Http\Requests\GuestBookInfoRequest;
use Modules\GuestBook\Service\GuestBookFrontService;

class GuestBookForFrontController extends BaseController
{
    /**
     * @param GuestBookFrontStoreRequest $request
     * @param AuthManager $auth
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function store(GuestBookFrontStoreRequest $request, AuthManager $auth)
    {
        return GuestBookFrontService::getInstance()->store($request, $auth->guard()->user());
    }

    /**
     * @param GuestBookFrontUpdateRequest $request
     * @param AuthManager $auth
     * @return array
     * @throws ApiErrorCodeException
     */
    public function update(GuestBookFrontUpdateRequest $request, AuthManager $auth)
    {
        return GuestBookFrontService::getInstance()->update($request, $auth->guard()->user());
    }

    /**
     * @param GuestBookFrontDeleteRequest $request
     * @param AuthManager $auth
     * @return array
     * @throws ApiErrorCodeException
     */
    public function delete(GuestBookFrontDeleteRequest $request, AuthManager $auth)
    {
        return GuestBookFrontService::getInstance()->delete($request, $auth->guard()->user());
    }

    /**
     * @param GuestBookInfoRequest $request
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function info(GuestBookInfoRequest $request)
    {
        return GuestBookFrontService::getInstance()->info($request);
    }

    /**
     * @param GuestBookFrontCommentRequest $request
     * @param AuthManager $auth
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function comment(GuestBookFrontCommentRequest $request, AuthManager $auth)
    {
        return GuestBookFrontService::getInstance()->comment($request, $auth->guard()->user());
    }

    /**
     * @param GuestBookFrontReactionRequest $request
     * @param AuthManager $auth
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function like(GuestBookFrontReactionRequest $request, AuthManager $auth)
    {
        return GuestBookFrontService::getInstance()->like($request, $auth->guard()->user());
    }

    /**
     * @param GuestBookFrontReactionRequest $request
     * @param AuthManager $auth
     * @return GuestBook
     * @throws ApiErrorCodeException
     */
    public function disLike(GuestBookFrontReactionRequest $request, AuthManager $auth)
    {
        return GuestBookFrontService::getInstance()->dislike($request, $auth->guard()->user());
    }
}

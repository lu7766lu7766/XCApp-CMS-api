<?php

namespace Modules\Comment\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Comment\Http\Requests\CommentReactionRequest;
use Modules\Comment\Http\Requests\GetMessageInfoRequest;
use Modules\Comment\Service\CommentReaction;
use Modules\Comment\Service\CommentService;

class CommentController extends BaseController
{
    /**
     * 取得評論資訊
     * @param GetMessageInfoRequest $request
     * @return array
     */
    public function getComment(GetMessageInfoRequest $request)
    {
        return CommentService::getInstance()->commentInfo($request);
    }

    /**
     * 評論總數
     * @param GetMessageInfoRequest $request
     * @return int
     */
    public function total(GetMessageInfoRequest $request)
    {
        return CommentService::getInstance()->total($request);
    }

    /**
     * 點擊反應,增加反應數
     * @param AuthManager $auth
     * @param CommentReactionRequest $request
     * @return array
     */
    public function reaction(AuthManager $auth, CommentReactionRequest $request)
    {
        return ['result' => CommentReaction::getInstance($auth->guard()->user())->reacting($request)];
    }

    /**
     * 取消反應,減少反應數
     * @param AuthManager $auth
     * @param CommentReactionRequest $request
     * @return array
     */
    public function cancelReaction(AuthManager $auth, CommentReactionRequest $request)
    {
        return ['result' => CommentReaction::getInstance($auth->guard()->user())->cancelReaction($request)];
    }
}

<?php

namespace Modules\Comment\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Comment\Http\Requests\AddCommentRequest;
use Modules\Comment\Http\Requests\GetMessageInfoRequest;
use Modules\Comment\Http\Requests\ThemeReactionRequest;
use Modules\Comment\Service\ThemeOperateService;
use Modules\Comment\Service\ThemeService;

class ThemeController extends BaseController
{
    /**
     * 新增主題的評論
     * @param AuthManager $auth
     * @param AddCommentRequest $request
     * @return Model
     */
    public function addComment(AuthManager $auth, AddCommentRequest $request)
    {
        return ThemeOperateService::getInstance($auth->guard()->user())->add($request);
    }

    /**
     * 取得主題資訊
     * @param GetMessageInfoRequest $request
     * @return \Illuminate\Database\Eloquent\Collection|[]
     */
    public function getTheme(GetMessageInfoRequest $request)
    {
        return ThemeService::getInstance()->themeInfo($request);
    }

    /**
     * 點擊反應,增加反應數
     * @param AuthManager $auth
     * @param ThemeReactionRequest $request
     * @return array
     */
    public function reaction(AuthManager $auth, ThemeReactionRequest $request)
    {
        return ['result' => ThemeOperateService::getInstance($auth->guard()->user())->reacting($request)];
    }

    /**
     * 取消反應,減少反應數
     * @param AuthManager $auth
     * @param ThemeReactionRequest $request
     * @return array
     */
    public function cancelReaction(AuthManager $auth, ThemeReactionRequest $request)
    {
        return ['result' => ThemeOperateService::getInstance($auth->guard()->user())->cancelReaction($request)];
    }
}

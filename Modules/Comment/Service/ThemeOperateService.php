<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/13
 * Time: 下午 04:36
 */

namespace Modules\Comment\Service;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Comment\Http\Requests\AddCommentRequest;
use Modules\Comment\Http\Requests\ThemeReactionRequest;
use Modules\Comment\Repository\ThemeRepo;

class ThemeOperateService
{
    use Singleton;
    /**
     * @var Authenticatable
     */
    protected $auth;

    protected function init(Authenticatable $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param AddCommentRequest $handle
     * @return Model
     */
    public function add(AddCommentRequest $handle)
    {
        return app(ThemeRepo::class)->findOrCreate(
            $handle->getThemeId(),
            $this->auth->getAuthIdentifier(),
            $handle->getMessage()
        );
    }

    /**
     * 點擊反應,增加反應數
     * @param ThemeReactionRequest $handle
     * @return bool
     */
    public function reacting(ThemeReactionRequest $handle)
    {
        return app(ThemeRepo::class)->reacting(
            $handle->getThemeId(),
            $this->auth->getAuthIdentifier(),
            $handle->getReactionKind()
        );
    }

    /**
     * 取消反應,減少反應數
     * @param ThemeReactionRequest $handle
     * @return bool
     */
    public function cancelReaction(ThemeReactionRequest $handle)
    {
        return app(ThemeRepo::class)->cancel(
            $handle->getThemeId(),
            $this->auth->getAuthIdentifier(),
            $handle->getReactionKind()
        );
    }
}

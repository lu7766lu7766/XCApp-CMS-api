<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/13
 * Time: 下午 04:43
 */

namespace Modules\Comment\Service;

use Illuminate\Contracts\Auth\Authenticatable;
use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Comment\Http\Requests\CommentReactionRequest;
use Modules\Comment\Repository\CommentRepo;

class CommentReaction
{
    use Singleton;
    /**
     * @var Authenticatable
     */
    protected $auth;

    public function __construct(Authenticatable $auth)
    {
        $this->auth = $auth;
    }

    /**
     * 點擊反應,增加反應數
     * @param CommentReactionRequest $handle
     * @return bool
     */
    public function reacting(CommentReactionRequest $handle)
    {
        return app(CommentRepo::class)->reacting(
            $handle->getCommentId(),
            $this->auth->getAuthIdentifier(),
            $handle->getReactionKind()
        );
    }

    /**
     * 取消反應,減少反應數
     * @param CommentReactionRequest $handle
     * @return bool
     */
    public function cancelReaction(CommentReactionRequest $handle)
    {
        return app(CommentRepo::class)->cancel(
            $handle->getCommentId(),
            $this->auth->getAuthIdentifier(),
            $handle->getReactionKind()
        );
    }
}

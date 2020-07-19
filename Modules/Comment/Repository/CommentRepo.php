<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/12
 * Time: 下午 04:38
 */

namespace Modules\Comment\Repository;

use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Comment\Entities\Comment;

class CommentRepo
{
    /**
     * @param int $themeId
     * @param int $page
     * @param int $perpage
     * @return \Illuminate\Database\Eloquent\Collection|[]
     */
    public function commentList(int $themeId, int $page = 1, int $perpage = 20)
    {
        $result = [];
        try {
            $result = Comment::where('theme_id', $themeId)
                ->with(Comment::MORPH_COUNTER, Comment::ACCOUNT)
                ->orderBy('id', 'DESC')
                ->forPage($page, $perpage)
                ->get();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $themeId
     * @return int
     */
    public function total(int $themeId)
    {
        $result = 0;
        try {
            $result = Comment::where('theme_id', $themeId)
                ->orderBy('id', 'DESC')
                ->count();
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $CommentId
     * @param int $accountId
     * @param int $reactionKind
     * @return bool
     */
    public function reacting(int $CommentId, int $accountId, int $reactionKind)
    {
        $result = false;
        try {
            \DB::transaction(function () use ($CommentId, $reactionKind, $accountId, &$result) {
                $orm = Comment::where('id', $CommentId)->first();
                if (!is_null($orm)) {
                    /** @var Comment $orm */
                    if ($orm->addAccountReaction($accountId, $reactionKind)) {
                        $result = $orm->increaseMorphCounter($reactionKind);
                    }
                }
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string $themeId
     * @param int $accountId
     * @param int $reactionKind
     * @return bool
     */
    public function cancel(string $themeId, int $accountId, int $reactionKind)
    {
        $result = false;
        try {
            \DB::transaction(function () use ($themeId, $reactionKind, $accountId, &$result) {
                $orm = Comment::where('id', $themeId)->first();
                if (!is_null($orm)) {
                    /** @var Comment $orm */
                    if ($orm->cancelAccountReaction($accountId, $reactionKind)) {
                        $result = $orm->decreaseMorphCounter($reactionKind);
                    }
                }
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }
}

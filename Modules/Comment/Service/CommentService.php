<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/12
 * Time: 下午 04:37
 */

namespace Modules\Comment\Service;

use Modules\Base\Support\Traits\Pattern\Singleton;
use Modules\Comment\Http\Requests\GetMessageInfoRequest;
use Modules\Comment\Repository\CommentRepo;
use Modules\Comment\Repository\ThemeRepo;
use Modules\Comment\Service\Assist\FormatAssist;

class CommentService
{
    use Singleton;

    /**
     * @param GetMessageInfoRequest $handle
     * @return array
     */
    public function commentInfo(GetMessageInfoRequest $handle)
    {
        $result = [];
        $theme = app(ThemeRepo::class)->find($handle->getThemeId());
        if (!is_null($theme)) {
            $comments = app(CommentRepo::class)->commentList(
                $theme->getKey(),
                $handle->getPage(),
                $handle->getPerpage()
            );
            if (!is_null($comments)) {
                foreach ($comments as $items) {
                    $result[] = app(FormatAssist::class)->formatCommentInfo($items);
                }
            }
        }

        return $result;
    }

    /**
     * @param GetMessageInfoRequest $handle
     * @return int
     */
    public function total(GetMessageInfoRequest $handle)
    {
        $result = 0;
        $theme = app(ThemeRepo::class)->find($handle->getThemeId());
        if (!is_null($theme)) {
            $result = app(CommentRepo::class)->total($theme->getKey());
        }

        return $result;
    }
}

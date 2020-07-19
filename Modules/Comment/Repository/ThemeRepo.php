<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/31
 * Time: 下午 04:25
 */

namespace Modules\Comment\Repository;

use Illuminate\Database\Eloquent\Model;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Comment\Entities\Theme;

class ThemeRepo
{
    /**
     * @param string $themeId
     * @param int $accountId
     * @param string $message
     * @return Model
     */
    public function findOrCreate(string $themeId, int $accountId, string $message)
    {
        $result = null;
        try {
            \DB::transaction(function () use ($themeId, $accountId, $message, &$result) {
                /** @var Theme $orm */
                $orm = Theme::where('theme_id', $themeId)->firstOrCreate(['theme_id' => $themeId]);
                $result = $orm->addComment($accountId, $message);
            });
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string $themeId
     * @return Theme|null
     */
    public function findAndIncreaseViews(string $themeId)
    {
        $result = null;
        try {
            $result = Theme::where('theme_id', $themeId)->firstOrCreate(['theme_id' => $themeId]);
            /** @var Theme $result */
            $result->incrementRecord();
            $result->with(Theme::MORPH_COUNTER, Theme::VIEWS, Theme::ACCOUNT_REACTION);
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param string $themeId
     * @return Theme|null
     */
    public function find(string $themeId)
    {
        $result = null;
        try {
            $result = Theme::where('theme_id', $themeId)->first();
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
    public function reacting(string $themeId, int $accountId, int $reactionKind)
    {
        $result = false;
        try {
            \DB::transaction(function () use ($themeId, $reactionKind, $accountId, &$result) {
                $orm = Theme::where('theme_id', $themeId)->first();
                if (!is_null($orm)) {
                    /** @var Theme $orm */
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
                $orm = Theme::where('theme_id', $themeId)->first();
                if (!is_null($orm)) {
                    /** @var Theme $orm */
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

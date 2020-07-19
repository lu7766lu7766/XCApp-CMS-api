<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/12
 * Time: 下午 06:07
 */

namespace Modules\Comment\Service\Assist;

use Illuminate\Database\Eloquent\Collection;
use Modules\Comment\Entities\Comment;
use Modules\Comment\Entities\Theme;

class FormatAssist
{
    /**
     * @param Theme $info
     * @return array
     */
    public function formatThemeInfo(Theme $info)
    {
        $result = [
            'id'               => $info->id,
            'theme_id'         => $info->theme_id,
            'created_at'       => $info->created_at->toDateTimeString(),
            'updated_at'       => $info->updated_at->toDateTimeString(),
            'views'            => $info->counter->record,
            'reaction_count'   => $this->formatMorphCounter($info->morphCounter),
            'account_reaction' => $this->formatAccountReaction($info->accountReaction),
        ];

        return $result;
    }

    public function formatCommentInfo(Comment $items)
    {
        $result = [
            'id'             => $items->id,
            'message'        => $items->message,
            'created_at'     => $items->created_at->toDateTimeString(),
            'updated_at'     => $items->updated_at->toDateTimeString(),
            'account_info'   => $items->account,
            'reaction_count' => $this->formatMorphCounter($items->morphCounter),
        ];

        return $result;
    }

    /**
     *
     * @param $morphCounter
     * @return array
     */
    private function formatMorphCounter(Collection $morphCounter)
    {
        $result = [];
        if ($morphCounter) {
            foreach ($morphCounter as $counter) {
                $result[] = [
                    'kind'  => $counter->morph_counter_kind,
                    'count' => $counter->morph_counter,
                ];
            }
        }

        return $result;
    }

    private function formatAccountReaction(Collection $accountReaction)
    {
        $result = [];
        if ($accountReaction) {
            foreach ($accountReaction as $accountInfo) {
                $result[] = [
                    'id'           => $accountInfo->account_id,
                    'account'      => $accountInfo->account,
                    'display_name' => $accountInfo->display_name,
                    'kind'         => $accountInfo->account_reaction_kind
                ];
            }
        }

        return $result;
    }
}

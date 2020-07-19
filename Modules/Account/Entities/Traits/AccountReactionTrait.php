<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/7
 * Time: 下午 03:23
 */

namespace Modules\Account\Entities\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Constants\AccountStatusConstants;
use Modules\Account\Entities\Account;
use Modules\Account\Entities\AccountReaction;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\MorphCounter\Constants\MorphCounterConstants;

/**
 * Trait AccountReactionTrait
 * @package Modules\Account\Entities\Traits
 * @property Collection|AccountReaction[] accountReaction
 * @mixin Model
 */
trait AccountReactionTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function accountReaction()
    {
        $result = $this->morphToMany(
            Account::class,
            'account_reaction',
            'account_reaction',
            'account_reaction_target_id',
            'account_id'
        );
        $result->select('account.account', 'account.display_name', 'account_reaction.*');

        return $result;
    }

    /**
     * 點擊反應
     * @param int $accountId
     * @param int $kind
     * @return bool
     */
    public function addAccountReaction(int $accountId, int $kind = MorphCounterConstants::THUMBS_UP)
    {
        $result = false;
        try {
            if (Account::where('status', AccountStatusConstants::ENABLE)->where('id', $accountId)->exists()
                && MorphCounterConstants::isValidValue($kind)
            ) {
                $reaction = $this->getReaction($accountId, $kind);
                if (is_null($reaction)) {
                    $this->accountReaction()->attach($accountId, [
                        'account_reaction_kind' => $kind,
                    ]);
                    $result = true;
                }
            }
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * 取消反應
     * @param int $accountId
     * @param int $kind
     * @return bool
     */
    public function cancelAccountReaction(int $accountId, int $kind = MorphCounterConstants::THUMBS_UP)
    {
        $result = false;
        try {
            if (Account::where('status', AccountStatusConstants::ENABLE)->where('id', $accountId)->exists()
                && MorphCounterConstants::isValidValue($kind)) {
                $accountReaction = $this->getReaction($accountId, $kind);
                if (!is_null($accountReaction)) {
                    $this->accountReaction()->detach($accountId);
                    $result = true;
                }
            }
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $result;
    }

    /**
     * @param int $accountId
     * @param int $kind
     * @return Account|null
     */
    private function getReaction(int $accountId, int $kind)
    {
        $accountReaction = $this->accountReaction()
            ->where('account_id', $accountId)
            ->where('account_reaction_kind', $kind)
            ->first();

        return $accountReaction;
    }
}

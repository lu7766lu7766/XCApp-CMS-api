<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/5
 * Time: 下午 07:11
 */

namespace Modules\Comment\Entities\traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Account\Entities\Account;
use Modules\Base\Util\LaravelLoggerUtil;
use Modules\Comment\Entities\Comment;

/**
 * Trait CommentTrait
 * @package Modules\Comment\Entities\traits
 * @property Collection|Comment[] comment
 * @mixin Model
 */
trait CommentTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function comment()
    {
        $result = $this->morphToMany(Account::class, 'comment', 'comment', 'theme_id', 'account_id');
        $result->select('account.account', 'account.display_name', 'comment.*');

        return $result;
    }

    /**
     * @param int $accountId
     * @param string $message
     * @return Model
     */
    public function addComment(int $accountId, string $message)
    {
        $dateTime = date('Y-m-d H:i:s');
        try {
            $this->comment()->attach($accountId, [
                'message'    => $message,
                'created_at' => $dateTime,
                'updated_at' => $dateTime
            ]);
        } catch (\Throwable $e) {
            LaravelLoggerUtil::loggerException($e);
        }

        return $this;
    }
}

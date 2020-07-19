<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/31
 * Time: 下午 04:08
 */

namespace Modules\Comment\Entities;

use Carbon\Carbon;
use Modules\Account\Entities\Account;
use Modules\Account\Entities\Traits\AccountReactionTrait;
use Modules\Base\Entities\BaseORM;
use Modules\MorphCounter\Entities\Traits\MorphCounterTrait;

/**
 * @property int id
 * @property string message
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Account account
 */
class Comment extends BaseORM
{
    use AccountReactionTrait;
    use MorphCounterTrait;
    protected $table = 'comment';
    protected $fillable = [
        'message',
        'created_at',
        'updated_at'
    ];
    const MORPH_COUNTER = 'morphCounter';
    const ACCOUNT = 'account';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        $result = $this->belongsTo(Account::class, 'account_id');
        $result->select('id', 'account', 'display_name');

        return $result;
    }
}

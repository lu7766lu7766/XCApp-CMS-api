<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/17
 * Time: 下午 02:56
 */

namespace Modules\Node\Entities;

use Modules\Account\Entities\Account;
use Modules\Base\Entities\BaseORM;

/**
 * @property int account_id
 */
class NodeSort extends BaseORM
{
    protected $table = 'node_sort';
    protected $fillable = [
        'sort'
    ];
    protected $casts = [
        'sort' => 'array',
    ];
    const ACCOUNT = 'account';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}

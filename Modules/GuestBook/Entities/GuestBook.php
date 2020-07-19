<?php

namespace Modules\GuestBook\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Account\Entities\Account;
use Modules\Account\Entities\Traits\AccountReactionTrait;
use Modules\Base\Entities\BaseORM;
use Modules\Comment\Entities\traits\CommentTrait;
use Modules\Counter\Entities\CounterTraitHelper;
use Modules\MorphCounter\Entities\Traits\MorphCounterTrait;

class GuestBook extends BaseORM
{
    use CounterTraitHelper;
    use CommentTrait;
    use MorphCounterTrait;
    use AccountReactionTrait;
    /**
     * @var string
     */
    protected $table = 'guest_book';
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'account_id',
        'created_at',
        'updated_at',
    ];

    /**
     * @return BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(Account::class, 'account_id', 'id');
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/31
 * Time: 下午 04:26
 */

namespace Modules\Comment\Entities;

use Carbon\Carbon;
use Modules\Account\Entities\Traits\AccountReactionTrait;
use Modules\Base\Entities\BaseORM;
use Modules\Comment\Entities\traits\CommentTrait;
use Modules\Counter\Entities\CounterTraitHelper;
use Modules\MorphCounter\Entities\Traits\MorphCounterTrait;

/**
 * @property int id
 * @property string theme_id
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Theme extends BaseORM
{
    use CommentTrait;
    use CounterTraitHelper;
    use AccountReactionTrait;
    use MorphCounterTrait;
    protected $table = 'comment_theme';
    protected $fillable = ['theme_id'];
    const ACCOUNT_REACTION = 'accountReaction';
    const MORPH_COUNTER = 'morphCounter';
    const VIEWS = 'counter';
}

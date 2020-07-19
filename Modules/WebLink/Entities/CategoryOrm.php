<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/2
 * Time: 上午 11:09
 */

namespace Modules\WebLink\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Base\Entities\BaseORM;
use Modules\Files\Entities\FilesRelationTraitHelper;

class CategoryOrm extends BaseORM
{
    use SoftDeletes;
    use FilesRelationTraitHelper;
    protected $table = 'web_link_category';
    protected $fillable = [
        'name',
        'status',
    ];
}

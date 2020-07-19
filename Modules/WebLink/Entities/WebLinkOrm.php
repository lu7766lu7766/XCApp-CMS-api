<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/2
 * Time: 下午 01:52
 */

namespace Modules\WebLink\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\Base\Entities\BaseORM;
use Modules\Files\Entities\FilesRelationTraitHelper;

class WebLinkOrm extends BaseORM
{
    use SoftDeletes;
    use FilesRelationTraitHelper;
    protected $table = 'web_link';
    protected $fillable = [
        'name',
        'category_id',
        'url_link',
        'status',
    ];
    const APP_MANAGEMENT = 'appManagement';
    const CATEGORY = 'category';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function appManagement()
    {
        return $this->morphToMany(AppManagementORM::class, 'relation', 'app_relation', 'relation_id', 'app_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryOrm::class);
    }
}

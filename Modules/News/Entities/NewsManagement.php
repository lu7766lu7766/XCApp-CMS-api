<?php

namespace Modules\News\Entities;

use Modules\AppManagement\Entities\AppManagementORM;
use Modules\Base\Entities\BaseORM;
use Modules\Files\Entities\FilesRelationTraitHelper;

class NewsManagement extends BaseORM
{
    use FilesRelationTraitHelper;
    protected $table = 'news_management';
    protected $fillable = [
        'name',
        'category_id',
        'content',
        'publish_time',
        'status',
        'banner_switch',
        'image_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function appManagement()
    {
        return $this->morphToMany(AppManagementORM::class, 'relation', 'app_relation', 'relation_id', 'app_id');
    }
}

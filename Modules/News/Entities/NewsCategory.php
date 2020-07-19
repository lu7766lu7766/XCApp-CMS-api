<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\Base\Entities\BaseORM;
use Modules\Files\Entities\FilesRelationTraitHelper;

class NewsCategory extends BaseORM
{
    use FilesRelationTraitHelper;
    protected $table = 'news_category';
    protected $fillable = [
        'name',
        'status',
    ];

    /**
     * @return MorphToMany
     */
    public function appManagement()
    {
        return $this->morphToMany(AppManagementORM::class, 'relation', 'app_relation', 'relation_id', 'app_id');
    }

    /**
     * @return HasMany
     */
    public function management()
    {
        return $this->hasMany(NewsManagement::class, 'category_id', 'id');
    }
}

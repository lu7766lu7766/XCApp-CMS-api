<?php

namespace Modules\Node\Entities;

use Modules\Base\Entities\BaseORM;
use Modules\Role\Entities\Role;

/**
 * Class Node
 * @property int parent_id
 * @property string route_uri
 * @package Modules\Node\Entities
 */
class Node extends BaseORM
{
    protected $table = 'node';
    protected $fillable = [
        'enable',
        'display',
        'display_name',
        'code'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permission()
    {
        return $this->hasMany(RoleNode::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_node', 'node_id', 'role_id')
            ->withTimestamps()
            ->withPivot('method_permission');
    }
}

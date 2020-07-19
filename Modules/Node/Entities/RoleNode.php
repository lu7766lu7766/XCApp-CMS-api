<?php

namespace Modules\Node\Entities;

use Modules\Base\Entities\BaseORM;
use Modules\Role\Entities\Role;

/**
 * @property int permission
 */
class RoleNode extends BaseORM
{
    protected $table = 'role_node';
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nodes()
    {
        return $this->belongsTo(Node::class, 'node_id');
    }
}

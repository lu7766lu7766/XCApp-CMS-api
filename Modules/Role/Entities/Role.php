<?php

namespace Modules\Role\Entities;

use Modules\Account\Entities\Account;
use Modules\Base\Entities\BaseORM;
use Modules\Node\Entities\Node;
use Modules\Node\Entities\RoleNode;

/**
 * @property string code
 */
class Role extends BaseORM
{
    protected $table = 'role';
    protected $fillable = [
        'display_name',
        'code',
        'is_assign',
        'can_edit',
        'enable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function accounts()
    {
        return $this->belongsToMany(Account::class, 'account_role', 'role_id', 'account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function nodes()
    {
        return $this->belongsToMany(Node::class, 'role_node', 'role_id', 'node_id')
            ->withTimestamps()
            ->withPivot('method_permission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permission()
    {
        return $this->hasMany(RoleNode::class);
    }
}

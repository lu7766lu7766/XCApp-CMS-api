<?php

namespace Modules\Account\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Modules\Base\Entities\CitizenORM;
use Modules\Files\Entities\FilesRelationTraitHelper;
use Modules\OtpAuth\Entities\OtpAuthRelationTraitHelper;
use Modules\Role\Entities\Role;

/**
 * Class Account
 * @property string account
 * @package Modules\Account\Entities
 */
class Account extends CitizenORM
{
    use FilesRelationTraitHelper;
    use OtpAuthRelationTraitHelper;
    use HasApiTokens;
    use SoftDeletes;
    protected $table = 'account';
    protected $softDelete = true;
    protected $fillable = [
        'account',
        'password',
        'display_name',
        'status',
        'mail',
        'phone',
        'login_ip'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'account_role', 'account_id', 'role_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loginLog()
    {
        return $this->hasMany(AccountLoginLog::class);
    }

    /**
     * @param string $account
     * @return $this|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null.
     */
    public function findForPassport(string $account)
    {
        return self::where('account', $account)->first();
    }

    public function disableHidden()
    {
        $this->hidden = [];

        return $this;
    }

    /**
     * @return Role
     */
    public static function roleModel()
    {
        return new Role();
    }
}

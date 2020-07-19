<?php

namespace Modules\AppManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Device
 * @package Modules\Device\Entities
 * @property AppManagementORM appManagement
 * @property string identification
 */
class DeviceORM extends Model
{
    protected $table = 'device';
    protected $fillable = [
        'identify'
    ];

    /**
     * @return BelongsTo
     */
    public function appManagement()
    {
        return $this->belongsTo(AppManagementORM::class);
    }
}

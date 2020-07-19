<?php

namespace Modules\PushNotification\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Modules\AppManagement\Entities\AppManagementORM;
use Modules\Base\Entities\BaseORM;
use Modules\Jobs\Entities\Jobs;

/**
 * Class PushNotification
 * @package Modules\PushNotification\Entities
 * @property AppManagementORM[]|Collection appManagements
 * @property int id
 * @property string content
 * @property int schedule_time
 * @property array topic_id
 * @property string push_path
 */
class PushNotification extends BaseORM
{
    use SoftDeletes;
    protected $table = 'push_notification';
    protected $fillable = [
        'content',
        'schedule_time'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function jobs()
    {
        return $this->belongsToMany(Jobs::class, 'push_notification_jobs', 'push_notification_id', 'jobs_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function appManagements()
    {
        return $this->belongsToMany(
            AppManagementORM::class,
            'app_management_push_notification',
            'push_notification_id',
            'app_management_id'
        );
    }
}

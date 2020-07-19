<?php

namespace Modules\AppAutomation\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Modules\Base\Entities\BaseORM;
use Modules\Files\Entities\Files;
use Modules\Files\Entities\FilesRelationTraitHelper;

/**
 * Class AppAutomation
 * @package Modules\AppAutomation\Entities
 * @property string code
 * @property string uuid
 * @property array platform
 * @property Collection|Files[] used
 */
class AppAutomation extends BaseORM
{
    use FilesRelationTraitHelper;
    use SoftDeletes;
    protected $table = 'app_automation';
    protected $fillable = [
        'uuid',
        'code',
        'name',
        'package_name',
        'status',
        'platform',
        'notify_channel',
        'config'
    ];
    protected $casts = [
        'platform' => 'array',
        'config'   => 'array'
    ];
}

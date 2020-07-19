<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/6/6
 * Time: 下午 01:56
 */

namespace Modules\IpManagement\Entities;

use Modules\Base\Entities\BaseORM;

class IpManagement extends BaseORM
{
    protected $table = 'ip_management';
    protected $fillable = [
        'ip',
        'type',
        'device',
        'status',
        'remark'
    ];
}

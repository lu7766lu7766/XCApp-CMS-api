<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/15
 * Time: 上午 11:04
 */

namespace Modules\Jobs\Entities;

use Modules\Base\Entities\BaseORM;

class Jobs extends BaseORM
{
    /**
     * @var string
     */
    protected $table = 'jobs';
    /**
     * @var array
     */
    protected $hidden = [
        'payload',
        'attempts',
        'reserved_at'
    ];
}

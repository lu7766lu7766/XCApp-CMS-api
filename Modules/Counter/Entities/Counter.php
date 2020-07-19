<?php

namespace Modules\Counter\Entities;

use Modules\Base\Entities\BaseORM;

/**
 * Class Counter
 * @package Modules\Counter\Entities
 * @property int record
 */
class Counter extends BaseORM
{
    /**
     * @var array
     */
    protected $fillable = [
        'record',
        'relative_id',
        'relative_type',
    ];
    /**
     * @var string
     */
    protected $table = 'counter';
    public $timestamps = false;
}

<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/11/8
 * Time: 下午 02:09
 */

namespace Modules\MorphCounter\Entities;

use Modules\Base\Entities\BaseORM;

/**
 * @property int morph_counter_kind
 * @property int morph_counter
 */
class MorphCounter extends BaseORM
{
    protected $table = 'morph_counter';
    protected $fillable = ['morph_counter', 'morph_counter_kind'];
    public $timestamps = false;
}

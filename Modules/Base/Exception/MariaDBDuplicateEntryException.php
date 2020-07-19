<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/6/18
 * Time: 下午 06:44
 */

namespace Modules\Base\Exception;

use Illuminate\Database\QueryException;

class MariaDBDuplicateEntryException extends QueryException
{
}

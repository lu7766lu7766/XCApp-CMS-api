<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/27
 * Time: 上午 10:52
 */

namespace Modules\Node\Assist\Collection;

use Modules\Base\Assist\GetterToSnakeKeyItemCollection;

/**
 * Class NodeCreateCollection
 * @package Modules\Node\Assist\Collection
 * @method string getEnable($default = null)
 * @method string getDisplay($default = null)
 * @method string getDisplayName($default = null)
 * @method string getCode($default = null)
 * @method string getRouteUri($default = null)
 * @method int getParentCode($default = null)
 */
class NodeCreateCollection extends GetterToSnakeKeyItemCollection
{
}

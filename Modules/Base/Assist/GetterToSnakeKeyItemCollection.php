<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/27
 * Time: 上午 11:34
 */

namespace Modules\Base\Assist;

use Illuminate\Support\Collection;
use Modules\Base\Support\Scalar\StringMaster;

/**
 * Class GetterToSnakeKeyItemCollection
 * @package Modules\Base\Assist
 */
class GetterToSnakeKeyItemCollection extends Collection
{
    /**
     * @param array $items
     * @return $this
     */
    public function setItems(array $items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Handle a getter method call to get item value,
     * the method transform camel case to snake_case as item key to get value.
     * @param string $method
     * @param array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (StringMaster::startsWith($method, 'get')) {
            $key = StringMaster::snake(StringMaster::replaceFirst('get', '', $method));

            return $this->items[$key] ?? $parameters[0] ?? null;
        }

        return parent::__call($method, $parameters);
    }
}

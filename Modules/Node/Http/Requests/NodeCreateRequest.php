<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/26
 * Time: 下午 04:40
 */

namespace Modules\Node\Http\Requests;

use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;
use Modules\Node\Assist\Collection\NodeCreateCollection;

class NodeCreateRequest extends HandleInvalidRequest
{
    /**
     * @return array
     */
    public function getNodes()
    {
        return $this->request['nodes'] ?? [];
    }

    /**
     * Pass node data on by on into the callback,
     * the node data type is \Modules\Node\Assist\Collection\NodeCreateCollection.
     * @param \Closure $callback
     * @see \Modules\Node\Assist\Collection\NodeCreateCollection to know the properties.
     */
    public function forEach(\Closure $callback)
    {
        $collection = NodeCreateCollection::make();
        foreach ($this->getNodes() as $node) {
            $collection->setItems($node);
            $callback($collection);
        }
    }

    /**
     * Request args validate rules.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write rule.
     * @return array
     * @see https://laravel.com/docs/master/validation#available-validation-rules checkout
     * this to get more rule keyword info
     */
    protected function rules()
    {
        return [
            'nodes'                => 'sometimes|required|array|max:10',
            'nodes.*.enable'       => 'sometimes|required|in:' . NYEnumConstants::implodeEnum(),
            'nodes.*.display'      => 'sometimes|required|in:' . NYEnumConstants::implodeEnum(),
            'nodes.*.display_name' => 'required|string|between:1,50',
            'nodes.*.code'         => 'required|string|between:1,20',
            'nodes.*.route_uri'    => 'sometimes|required|string|between:1,255',
            'nodes.*.parent_code'  => 'sometimes|required|string|between:1,20',
        ];
    }

    /**
     * Request args validate msg on fail.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write message.
     * @return array
     * @see https://laravel.com/docs/master/validation#customizing-the-error-messages
     * checkout this to get more message info
     * @see https://laravel.com/docs/master/validation#working-with-error-messages
     * checkout this to get more message info
     */
    protected function messages()
    {
        return [];
    }
}

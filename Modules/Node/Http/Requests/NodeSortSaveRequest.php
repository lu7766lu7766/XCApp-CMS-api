<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/17
 * Time: 下午 12:43
 */

namespace Modules\Node\Http\Requests;

use Modules\Base\Constants\ApiCode\Node60000\NodeCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class NodeSortSaveRequest extends BaseFormRequest
{
    /**
     * 排序
     * @return array
     */
    public function getSort()
    {
        return $this->get('sort');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'sort'   => 'required|array',
            'sort.*' => 'integer',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'sort.required'  => NodeCodeConstants::SORT_REQUIRED,
            'sort.array'     => NodeCodeConstants::SORT_MUST_BE_ARRAY,
            'sort.*.integer' => NodeCodeConstants::SORT_VALUE_MUST_BE_INT,
        ];
    }
}

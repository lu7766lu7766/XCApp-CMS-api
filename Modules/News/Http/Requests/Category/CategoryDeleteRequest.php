<?php

namespace Modules\News\Http\Requests\Category;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class CategoryDeleteRequest extends BaseFormRequest
{
    /**
     * @return array
     */
    public function getIds()
    {
        return $this->get('id', []);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ['id' => 'required|array|between:1,100'];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.array'    => NewsCodeConstants:: ID_BE_ARRAY,
            'id.between'  => NewsCodeConstants::ID_COUNT_ONE_BETWEEN_HUNDRED,
        ];
    }
}

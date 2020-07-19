<?php

namespace Modules\News\Http\Requests\Category;

use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class CategoryTotalRequest extends BaseFormRequest
{
    /**
     * @return string|null
     */
    public function getSearch()
    {
        return $this->get('search', null);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'search' => 'sometimes|required|string'
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function messages()
    {
        return [
            'search.string' => NewsCodeConstants::NAME_BE_STRING
        ];
    }
}

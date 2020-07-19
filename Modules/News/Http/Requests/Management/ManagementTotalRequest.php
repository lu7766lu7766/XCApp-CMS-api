<?php

namespace Modules\News\Http\Requests\Management;

use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class ManagementTotalRequest extends BaseFormRequest
{
    /**
     * @return string
     */
    public function getSearch()
    {
        return $this->get('search', '');
    }

    /**
     * @return int|null
     */
    public function getCategoryId()
    {
        return $this->get('category_id', null);
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            'search'      => 'sometimes|required|string',
            'category_id' => 'sometimes|required|integer'
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function messages()
    {
        return [
            'search.string'       => NewsCodeConstants::SEARCH_BE_STRING,
            'category_id.integer' => NewsCodeConstants::CATEGORY_ID_BE_INTEGER,
        ];
    }
}

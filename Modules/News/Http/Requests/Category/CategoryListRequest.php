<?php

namespace Modules\News\Http\Requests\Category;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class CategoryListRequest extends BaseFormRequest
{
    /**
     * @return string
     */
    public function getSearch()
    {
        return $this->get('search', null);
    }

    /**
     * @return integer
     */
    public function getPage()
    {
        return $this->get('page') ?? 1;
    }

    /**
     * @return integer
     */
    public function getPerPage()
    {
        return $this->get('perpage') ?? 20;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'search'  => 'sometimes|required|string',
            'page'    => 'sometimes|required|integer',
            'perpage' => 'sometimes|required|integer',
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function messages()
    {
        return [
            'search.string'   => NewsCodeConstants::SEARCH_BE_STRING,
            'page.integer'    => HttpAttributeInvalidCode::PAGE_MUST_BE_INTEGER,
            'perpage.integer' => HttpAttributeInvalidCode::PERPAGE_MUST_BE_INTEGER,
        ];
    }
}

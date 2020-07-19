<?php

namespace Modules\GuestBook\Http\Requests;

use Modules\Base\Constants\ApiCode\GuestBook80000\GuestBookCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class GuestBookListRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getPage()
    {
        return $this->get('page', 1);
    }

    /**
     * @return int
     */
    public function getPerpage()
    {
        return $this->get('perpage', 20);
    }

    /**
     * @return string
     */
    public function getSearch()
    {
        return $this->get('search', '');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'search'  => 'sometimes|required|string',
            'page'    => 'sometimes|required|integer',
            'perpage' => 'sometimes|required|integer|between:1,100',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'search.string'   => GuestBookCodeConstants::SEARCH_BE_STRING,
            'page.integer'    => HttpAttributeInvalidCode::PAGE_MUST_BE_INTEGER,
            'perpage.integer' => HttpAttributeInvalidCode::PERPAGE_MUST_BE_INTEGER,
            'perpage.between' => HttpAttributeInvalidCode::PERPAGE_BETWEEN_1_100
        ];
    }
}

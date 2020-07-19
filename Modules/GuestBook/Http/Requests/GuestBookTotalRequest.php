<?php

namespace Modules\GuestBook\Http\Requests;

use Modules\Base\Constants\ApiCode\GuestBook80000\GuestBookCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class GuestBookTotalRequest extends BaseFormRequest
{
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
            'search' => 'sometimes|required|string',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'search.string' => GuestBookCodeConstants::SEARCH_BE_STRING,
        ];
    }
}

<?php

namespace Modules\GuestBook\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class GuestBookInfoRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

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
    public function getPerPage()
    {
        return $this->get('perpage', 25);
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            'id'      => 'required|integer',
            'page'    => 'sometimes|required|integer',
            'perpage' => 'sometimes|required|integer|between:1,100'
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function messages()
    {
        return [
            'id.required'     => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.integer'      => HttpAttributeInvalidCode::ID_BE_INTEGER,
            'page.integer'    => HttpAttributeInvalidCode::PAGE_MUST_BE_INTEGER,
            'perpage.integer' => HttpAttributeInvalidCode::PERPAGE_MUST_BE_INTEGER,
            'perpage.between' => HttpAttributeInvalidCode::PERPAGE_BETWEEN_1_100
        ];
    }
}

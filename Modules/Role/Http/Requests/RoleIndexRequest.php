<?php

namespace Modules\Role\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class RoleIndexRequest extends BaseFormRequest
{
    /**
     * 頁數
     * @return int
     */
    public function getPage()
    {
        return $this->get('page', 1);
    }

    /**
     * 筆數
     * @return int
     */
    public function getPerpage()
    {
        return $this->get('perpage', 20);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'page'    => 'sometimes|required|integer',
            'perpage' => 'sometimes|required|integer|between:1,100',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'page.integer'    => HttpAttributeInvalidCode::PAGE_MUST_BE_INTEGER,
            'perpage.integer' => HttpAttributeInvalidCode::PERPAGE_MUST_BE_INTEGER,
            'perpage.between' => HttpAttributeInvalidCode::PERPAGE_BETWEEN_1_100,
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}

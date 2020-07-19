<?php

namespace Modules\GuestBook\Http\Requests;

use Modules\Base\Constants\ApiCode\GuestBook80000\GuestBookCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class GuestBookDeleteRequest extends BaseFormRequest
{
    public function getIds()
    {
        return $this->get('id', []);
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|array|between:1,100',
        ];
    }

    /**
     * @inheritdoc
     * @return  array
     */
    public function messages()
    {
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.array'    => GuestBookCodeConstants::ID_BE_ARRAY,
            'id.between'  => GuestBookCodeConstants::ID_SIZE_BETWEEN_1_100,
        ];
    }
}

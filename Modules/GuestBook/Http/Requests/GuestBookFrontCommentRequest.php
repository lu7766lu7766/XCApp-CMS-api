<?php

namespace Modules\GuestBook\Http\Requests;

use Modules\Base\Constants\ApiCode\GuestBook80000\GuestBookCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class GuestBookFrontCommentRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->get('message');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'      => 'required|integer',
            'message' => 'required|string',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.required'      => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.integer'       => HttpAttributeInvalidCode::ID_BE_INTEGER,
            'message.required' => GuestBookCodeConstants::MESSAGE_REQUIRED,
            'message.string'   => GuestBookCodeConstants::MESSAGE_BE_STRING,
        ];
    }
}

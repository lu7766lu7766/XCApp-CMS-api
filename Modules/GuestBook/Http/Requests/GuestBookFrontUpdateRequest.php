<?php

namespace Modules\GuestBook\Http\Requests;

use Modules\Base\Constants\ApiCode\GuestBook80000\GuestBookCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class GuestBookFrontUpdateRequest extends BaseFormRequest
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
    public function getTitle()
    {
        return $this->get('title');
    }

    /**
     * @return string
     */
    public function getGuestBookContent()
    {
        return $this->get('content');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'      => 'required|integer',
            'title'   => 'required|string',
            'content' => 'required|string'
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
            'title.required'   => GuestBookCodeConstants::TITLE_REQUIRED,
            'title.string'     => GuestBookCodeConstants::TITLE_BE_STRING,
            'content.required' => GuestBookCodeConstants::CONTENT_REQUIRED,
            'content.string'   => GuestBookCodeConstants::CONTENT_BE_STRING
        ];
    }
}

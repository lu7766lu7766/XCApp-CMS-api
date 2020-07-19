<?php

namespace Modules\GuestBook\Http\Requests;

use Modules\Base\Constants\ApiCode\GuestBook80000\GuestBookCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class GuestBookFrontStoreRequest extends BaseFormRequest
{
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
            'title.required'   => GuestBookCodeConstants::TITLE_REQUIRED,
            'title.string'     => GuestBookCodeConstants::TITLE_BE_STRING,
            'content.required' => GuestBookCodeConstants::CONTENT_REQUIRED,
            'content.string'   => GuestBookCodeConstants::CONTENT_BE_STRING
        ];
    }
}

<?php

namespace Modules\PushNotification\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class PushNotificationEditRequest extends HandleInvalidRequest
{
    public function getId()
    {
        return $this->request['id'];
    }

    /**
     * @inheritdoc
     */
    protected function rules()
    {
        return ['id' => 'required|integer'];
    }

    /**
     * @inheritdoc
     */
    protected function messages()
    {
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.integer'  => HttpAttributeInvalidCode::ID_BE_INTEGER,
        ];
    }
}

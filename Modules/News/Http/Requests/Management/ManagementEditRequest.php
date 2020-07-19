<?php

namespace Modules\News\Http\Requests\Management;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class ManagementEditRequest extends HandleInvalidRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return (int)$this->request['id'];
    }

    /**
     * @inheritdoc
     * @return array
     */
    protected function rules()
    {
        return ['id' => 'required|integer'];
    }

    /**
     * @inheritdoc
     * @return array
     */
    protected function messages()
    {
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.integer'  => HttpAttributeInvalidCode::ID_BE_INTEGER,
        ];
    }
}

<?php

namespace Modules\News\Http\Requests\Management;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\News50000\NewsCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class ManagementDeleteRequest extends BaseFormRequest
{
    /**
     * @return array
     */
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
        return ['id' => 'required|array|between:1,100'];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.array'    => NewsCodeConstants:: ID_BE_ARRAY,
            'id.between'  => NewsCodeConstants::ID_COUNT_ONE_BETWEEN_HUNDRED,
        ];
    }
}

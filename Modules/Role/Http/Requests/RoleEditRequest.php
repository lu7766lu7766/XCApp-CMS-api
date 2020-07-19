<?php

namespace Modules\Role\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class RoleEditRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id', 0);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->get('name');
    }

    /**
     * @return string
     */
    public function getEnable()
    {
        return $this->get('enable', NYEnumConstants::YES);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'     => 'sometimes|required|integer',
            'name'   => 'required|string|between:1,16',
            'enable' => 'sometimes|required|in:' . NYEnumConstants::implodeEnum(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.integer'    => HttpAttributeInvalidCode::ID_BE_INTEGER,
            'name.required' => HttpAttributeInvalidCode::DISPLAY_NAME_REQUIRED,
            'enable.in'     => HttpAttributeInvalidCode::ENABLE_MUST_IN_N_Y_LABEL
        ];
    }
}

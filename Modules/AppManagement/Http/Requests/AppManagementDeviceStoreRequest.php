<?php

namespace Modules\AppManagement\Http\Requests;

use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class AppManagementDeviceStoreRequest extends BaseFormRequest
{
    /**
     * @return string
     */
    public function getCode()
    {
        return $this->get('app_code');
    }

    /**
     * @return string
     */
    public function getIdentify()
    {
        return $this->get('identify');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'app_code' => 'required|string',
            'identify' => 'required|string'
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'app_code.required' => AppManagementCodeConstants::APP_CODE_IS_REQUIRED,
            'app_code.string'   => AppManagementCodeConstants::APP_CODE_MUST_BE_STRING,
            'identify.required' => AppManagementCodeConstants::IDENTIFY_IS_REQUIRED,
            'identify.string'   => AppManagementCodeConstants::IDENTIFY_MUST_BE_STRING
        ];
    }
}

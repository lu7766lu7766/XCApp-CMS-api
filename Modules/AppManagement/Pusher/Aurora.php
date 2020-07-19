<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/6/4
 * Time: 下午 05:03
 */

namespace Modules\AppManagement\Pusher;

use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;

class Aurora extends AbstractPusherConfigValidator
{
    /**
     * 驗證規則
     * @return array
     */
    protected function rules(): array
    {
        return [
            'app_key' => 'required|string',
            'secret'  => 'required|string',
        ];
    }

    /**
     * @return array
     */
    protected function messages(): array
    {
        return [
            'app_key.string'   => AppManagementCodeConstants::APP_KEY_VALUE_MUST_STRING,
            'secret.string'    => AppManagementCodeConstants::SECRET_VALUE_MUST_STRING,
            'app_key.required' =>
                AppManagementCodeConstants::APP_KEY_FIELD_IS_REQUIRED_WHEN_PUSH_PATH_IS_AURORA,
            'secret.required'  =>
                AppManagementCodeConstants::SECRET_FIELD_IS_REQUIRED_WHEN_PUSH_PATH_IS_AURORA,
        ];
    }
}

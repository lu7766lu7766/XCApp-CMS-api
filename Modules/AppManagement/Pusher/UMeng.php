<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/6/4
 * Time: 下午 05:36
 */

namespace Modules\AppManagement\Pusher;

use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;

class UMeng extends AbstractPusherConfigValidator
{
    /**
     * 驗證規則
     * @return array
     */
    protected function rules(): array
    {
        return [
            'app_key'    => 'required|string',
            'app_secret' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    protected function messages(): array
    {
        return [
            'app_key.string'      => AppManagementCodeConstants::APP_KEY_VALUE_MUST_STRING,
            'app_secret.string'   => AppManagementCodeConstants::APP_SECRET_VALUE_MUST_BE_STRING,
            'app_key.required'    =>
                AppManagementCodeConstants::APP_KEY_FIELD_IS_REQUIRED_WHEN_PUSH_PATH_IS_U_MENG,
            'app_secret.required' =>
                AppManagementCodeConstants::APP_SECRET_FIELD_IS_REQUIRED_WHEN_PUSH_PATH_IS_U_MENG,
        ];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/6/4
 * Time: 下午 05:31
 */

namespace Modules\AppManagement\Pusher;

use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;

class XiaoMi extends AbstractPusherConfigValidator
{
    /**
     * 驗證規則
     * @return array
     */
    protected function rules(): array
    {
        return [
            'app_secret'   => 'required|string',
            'package_name' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    protected function messages(): array
    {
        return [
            'app_secret.string'     => AppManagementCodeConstants::APP_SECRET_VALUE_MUST_STRING,
            'package_name.string'   => AppManagementCodeConstants::PACKAGE_NAME_VALUE_MUST_STRING,
            'app_secret.required'   =>
                AppManagementCodeConstants::APP_SECRET_FIELD_IS_REQUIRED_WHEN_PUSH_PATH_IS_XIAO_MI,
            'package_name.required' =>
                AppManagementCodeConstants::PACKAGE_NAME_FIELD_IS_REQUIRED_WHEN_PUSH_PATH_IS_XIAO_MI,
        ];
    }
}

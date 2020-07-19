<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2019/6/4
 * Time: 下午 05:00
 */

namespace Modules\AppManagement\Pusher;

use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;

class Aws extends AbstractPusherConfigValidator
{
    /**
     * 驗證規則
     * @return array
     */
    protected function rules(): array
    {
        return [
            'topic' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    protected function messages(): array
    {
        return [
            'topic.string'   => AppManagementCodeConstants::TOPIC_ID_VALUE_MUST_STRING,
            'topic.required' => AppManagementCodeConstants::TOPIC_FIELD_IS_REQUIRED_WHEN_PUSH_PATH_IS_AWS,
        ];
    }
}

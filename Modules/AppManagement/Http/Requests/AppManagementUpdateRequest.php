<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/13
 * Time: 下午 04:48
 */

namespace Modules\AppManagement\Http\Requests;

use Illuminate\Auth\AuthManager;
use Modules\AppManagement\Constants\CategoryConstants;
use Modules\AppManagement\Constants\MobileDeviceConstants;
use Modules\AppManagement\Constants\PushPathConstants;
use Modules\AppManagement\Constants\StatusConstants;
use Modules\AppManagement\Constants\SwitchConstants;
use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;

class AppManagementUpdateRequest extends AppManagementEditRequest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'               => 'required|integer',
            'mobile_device'    => 'required|string|in:' . MobileDeviceConstants::implodeEnum(),
            'code'             => 'required|string|max:20|
            unique:app_management,code,' . $this->getId() . ',id,deleted_at,NULL,account_id,'
                . app(AuthManager::class)->guard()->user()->getAuthIdentifier(),
            'name'             => 'required|string|max:30',
            'category'         => 'required|string|in:' . CategoryConstants::implodeEnum(),
            'redirect_switch'  => 'required|string|in:' . SwitchConstants::implodeEnum(),
            'redirect_url'     => 'sometimes|required|array',
            'redirect_url.*'   => 'url',
            'update_switch'    => 'required|string|in:' . SwitchConstants::implodeEnum(),
            'update_url'       => 'sometimes|required|string|active_url',
            'update_content'   => 'sometimes|required|string',
            'qq_id'            => 'sometimes|required|string|max:30',
            'wechat_id'        => 'sometimes|required|string|max:30',
            'customer_service' => 'sometimes|required|string',
            'status'           => 'required|string|in:' . StatusConstants::implodeEnum(),
            'push_path'        => 'required|string|in:' . PushPathConstants::implodeEnum(),
            'app_version'      => 'sometimes|required|string|max:10',
            'app_url'          => 'sometimes|required|string|url',
            'topic_id'         => 'sometimes|required|array',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.required'             => HttpAttributeInvalidCode::ID_REQUIRED,
            'mobile_device.required'  => AppManagementCodeConstants::MOBILE_DEVICE_REQUIRED,
            'code.required'           => AppManagementCodeConstants::CODE_REQUIRED,
            'name.required'           => AppManagementCodeConstants::NAME_REQUIRED,
            'category.required'       => AppManagementCodeConstants::CATEGORY_REQUIRED,
            'update_switch.required'  => AppManagementCodeConstants::UPDATE_SWITCH_REQUIRED,
            'status.required'         => AppManagementCodeConstants::STATUS_REQUIRED,
            'id.integer'              => HttpAttributeInvalidCode::ID_BE_INTEGER,
            'mobile_device.string'    => AppManagementCodeConstants::MOBILE_DEVICE_MUST_BE_STRING,
            'code.string'             => AppManagementCodeConstants::CODE_MUST_BE_STRING,
            'name.string'             => AppManagementCodeConstants::NAME_MUST_BE_STRING,
            'category.string'         => AppManagementCodeConstants::CATEGORY_MUST_BE_STRING,
            'redirect_switch.string'  => AppManagementCodeConstants::REDIRECT_SWITCH_MUST_BE_STRING,
            'update_switch.string'    => AppManagementCodeConstants::UPDATE_SWITCH_MUST_BE_STRING,
            'update_url.string'       => AppManagementCodeConstants::UPDATE_URL_MUST_BE_STRING,
            'update_content.string'   => AppManagementCodeConstants::UPDATE_CONTENT_MUST_BE_STRING,
            'qq_id.string'            => AppManagementCodeConstants::QQ_ID_MUST_BE_STRING,
            'wechat_id.string'        => AppManagementCodeConstants::WECHAT_ID_MUST_BE_STRING,
            'customer_service.string' => AppManagementCodeConstants::CUSTOMER_SERVICE_MUST_BE_STRING,
            'mobile_device.in'        => AppManagementCodeConstants::MOBILE_DEVICE_NOT_SUPPORT,
            'code.max'                => AppManagementCodeConstants::CODE_MAX_LENGTH_20,
            'name.max'                => AppManagementCodeConstants::NAME_MAX_LENGTH_30,
            'category.in'             => AppManagementCodeConstants::CATEGORY_NOT_SUPPORT,
            'redirect_switch.in'      => AppManagementCodeConstants::REDIRECT_SWITCH_NOT_SUPPORT,
            'redirect_url.array'      => AppManagementCodeConstants::REDIRECT_URL_MUST_BE_ARRAY,
            'redirect_url.*.url'      => AppManagementCodeConstants::REDIRECT_URL_NOT_A_URL,
            'update_switch.in'        => AppManagementCodeConstants::UPDATE_SWITCH_NOT_SUPPORT,
            'update_url.active_url'   => AppManagementCodeConstants::UPDATE_URL_NOT_ACTIVE_URL,
            'qq_id.max'               => AppManagementCodeConstants::QQ_ID_MAX_LENGTH_30,
            'wechat_id.max'           => AppManagementCodeConstants::WECHAT_MAX_LENGTH_30,
            'status.in'               => AppManagementCodeConstants::STATUS_NOT_SUPPORT,
            'code.unique'             => AppManagementCodeConstants::CODE_DUPLICATION,
            'push_path.required'      => AppManagementCodeConstants::PUSH_PATH_REQUIRED,
            'push_path.in'            => AppManagementCodeConstants::PUSH_PATH_NOT_SUPPORT,
            'app_version.string'      => AppManagementCodeConstants::APP_VERSION_MUST_BE_STRING,
            'app_version.max'         => AppManagementCodeConstants::APP_VERSION_MAX_LENGTH_10,
            'app_url.string'          => AppManagementCodeConstants::APP_URL_MUST_BE_STRING,
            'app_url.url'             => AppManagementCodeConstants::APP_URL_NOT_A_URL,
            'topic_id.array'          => AppManagementCodeConstants::TOPIC_ID_MUST_ARRAY
        ];
    }
}

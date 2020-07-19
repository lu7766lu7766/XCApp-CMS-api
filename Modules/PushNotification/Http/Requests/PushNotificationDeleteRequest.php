<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/10/19
 * Time: 上午 11:20
 */

namespace Modules\PushNotification\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\PushNotification40000\PushNotificationCodeConstants;
use Modules\Base\Http\Requests\BaseFormRequest;

class PushNotificationDeleteRequest extends BaseFormRequest
{
    /**
     * @return array
     */
    public function getIds()
    {
        return $this->get('id');
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function rules()
    {
        return [
            'id'   => 'required|array|between:1,20',
            'id.*' => 'integer'
        ];
    }

    /**
     * @inheritdoc
     * @return array
     */
    public function messages()
    {
        return [
            'id.required'  => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.array'     => PushNotificationCodeConstants::ID_BE_ARRAY_TYPE,
            'id.between'   => PushNotificationCodeConstants::ID_SIZE_BETWEEN_MIN_MAX,
            'id.*.integer' => HttpAttributeInvalidCode::ID_BE_INTEGER
        ];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/25
 * Time: 下午 03:18
 */

namespace Modules\PushNotification\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class PushNotificationIdRequest extends BaseFormRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @internal
     */
    public function rules()
    {
        return ['id' => 'required|integer'];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.integer'  => HttpAttributeInvalidCode::ID_BE_INTEGER,
        ];
    }
}

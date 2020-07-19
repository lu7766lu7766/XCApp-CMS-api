<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 01:03
 */

namespace Modules\Account\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AccountUpdateSelfRequest extends HandleInvalidRequest
{
    /**
     * @return string
     */
    public function getRequestKeyAttr()
    {
        return 'image';
    }

    /**
     * @return string|null
     */
    public function getOldPassword()
    {
        return $this->request['old_password'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getPassword()
    {
        return $this->request['password'] ?? null;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->request['display_name'] ?? null;
    }

    /**
     * @return null
     */
    public function getImage()
    {
        return $this->request['image'] ?? null;
    }

    /**
     * Request args validate rules.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write rule.
     * @return array
     * @see https://laravel.com/docs/master/validation#available-validation-rules checkout this to get more rule keyword info
     */
    protected function rules()
    {
        return [
            'old_password' => 'sometimes|required|string|between:4,32',
            'password'     => 'sometimes|required|string|between:4,32|same:confirm_password',
            'display_name' => 'required|string|nullable|between:1,16',
            'image'        => 'sometimes|required|image',
        ];
    }

    /**
     * Request args validate msg on fail.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write message.
     * @return array
     * @see https://laravel.com/docs/master/validation#customizing-the-error-messages checkout this to get more message info
     * @see https://laravel.com/docs/master/validation#working-with-error-messages checkout this to get more message info
     */
    protected function messages()
    {
        return [
            'old_password.required' => HttpAttributeInvalidCode::OLD_PASSWORD_REQUIRED,
            'password.required'     => HttpAttributeInvalidCode::NEW_PASSWORD_REQUIRED,
            'password.same'         => HttpAttributeInvalidCode::CONFIRM_PASSWORD_NOT_SAME,
            'display_name.required' => HttpAttributeInvalidCode::DISPLAY_NAME_REQUIRED,
            'image.image'           => HttpAttributeInvalidCode::IMAGE_TYPE_WRONG,
            'image.required'        => HttpAttributeInvalidCode::IMAGE_REQUIRE
        ];
    }
}

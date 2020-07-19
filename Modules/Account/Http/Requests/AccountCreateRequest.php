<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/4
 * Time: 下午 01:03
 */

namespace Modules\Account\Http\Requests;

use Modules\Account\Constants\AccountStatusConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;
use Modules\Base\Support\Scalar\ArrayMaster;

class AccountCreateRequest extends HandleInvalidRequest
{
    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->request['account'];
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->request['password'];
    }

    /**
     * @return string|null
     */
    public function getDisplayName()
    {
        return $this->request['display_name'] ?? null;
    }

    /**
     * @return array
     */
    public function getRoleId()
    {
        return $this->request['role_id'];
    }

    /**
     * @return string|null
     */
    public function getStatus()
    {
        return $this->request['status'] ?? AccountStatusConstants::ENABLE;
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
            'account'      => 'required|string|alpha_num|between:4,32',
            'password'     => 'required|string|between:4,32|same:confirm_password',
            'display_name' => 'required|string|nullable|between:1,10',
            'role_id'      => 'required|array',
            'role_id.*'    => 'required|integer',
            'status'       => 'sometimes|required|string|in:' . ArrayMaster::implode(CommonStatusConstants::enum())
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
            'account.required'  => HttpAttributeInvalidCode::ACCOUNT_REQUIRED,
            'account.alpha_num' => HttpAttributeInvalidCode::ACCOUNT_VALIDATE_ALPHA_NUM_FAIL,
            'password.required' => HttpAttributeInvalidCode::PASSWORD_REQUIRED,
            'password.same'     => HttpAttributeInvalidCode::CONFIRM_PASSWORD_NOT_SAME,
            'display_name.required' => HttpAttributeInvalidCode::DISPLAY_NAME_REQUIRED,
            'role_id.required'  => HttpAttributeInvalidCode::ROLE_REQUIRED,
            'status.required'   => HttpAttributeInvalidCode::STATUS_REQUIRE
        ];
    }
}

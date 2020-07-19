<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/29
 * Time: 下午 06:01
 */

namespace Modules\Account\Http\Requests;

use Modules\Base\Constants\ApiCode\Account10000\AccountCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AccountOtpAuthVerifyRequest extends HandleInvalidRequest
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->request['id'];
    }

    /**
     * @return string
     */
    public function getOtpCode()
    {
        return $this->request['otp_code'];
    }

    /**
     * @return string|null
     */
    public function getPassword()
    {
        return $this->request['password'] ?? null;
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
            'id'       => 'required|integer',
            'otp_code' => 'required|digits:6',
            'password' => 'sometimes|required|string'
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
            'id.required'       => HttpAttributeInvalidCode::ID_REQUIRED,
            'otp_code.required' => AccountCodeConstants::OTP_CODE_REQUIRE,
            'password.required' => HttpAttributeInvalidCode::PASSWORD_REQUIRED
        ];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/3/29
 * Time: 下午 06:01
 */

namespace Modules\Account\Http\Requests;

use Modules\Base\Constants\ApiCode\Account10000\AccountCodeConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AccountOtpAuthApplyRequest extends HandleInvalidRequest
{
    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->request['phone'];
    }

    /**
     * @return string
     */
    public function getAppName()
    {
        return $this->request['app_name'];
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
            'phone'    => 'required|digits_between:7,12',
            'app_name' => 'required|string'
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
            'phone.required'    => AccountCodeConstants::PHONE_REQUIRE,
            'app_name.required' => AccountCodeConstants::APP_NAME_REQUIRE
        ];
    }
}

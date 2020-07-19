<?php

namespace Modules\Account\Http\Requests;

use Modules\Base\Constants\ApiCode\Account10000\AccountCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class MemberAccountCreateRequest extends BaseFormRequest
{
    /**
     * @return string
     */
    public function getAccount()
    {
        return $this->get('account');
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->get('password');
    }

    /**
     * @return string|null
     */
    public function getDisplayName()
    {
        return $this->get('display_name');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'account'      => 'required|string|alpha_num|between:4,32|unique:account,account',
            'password'     => 'required|string|between:4,32|same:confirm_password',
            'display_name' => 'required|string|between:4,32'
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'account.required'      => HttpAttributeInvalidCode::ACCOUNT_REQUIRED,
            'account.alpha_num'     => HttpAttributeInvalidCode::ACCOUNT_VALIDATE_ALPHA_NUM_FAIL,
            'account.unique'        => AccountCodeConstants::ACCOUNT_ALREADY_EXIST,
            'password.required'     => HttpAttributeInvalidCode::PASSWORD_REQUIRED,
            'password.same'         => HttpAttributeInvalidCode::CONFIRM_PASSWORD_NOT_SAME,
            'display_name.required' => HttpAttributeInvalidCode::DISPLAY_NAME_REQUIRED,
            'display_name.between'  => HttpAttributeInvalidCode::DISPLAY_NAME_LENGTH_BETWEEN_4_32
        ];
    }
}

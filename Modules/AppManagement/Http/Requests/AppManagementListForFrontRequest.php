<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/14
 * Time: 下午 02:18
 */

namespace Modules\AppManagement\Http\Requests;

use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AppManagementListForFrontRequest extends HandleInvalidRequest
{
    /**
     * 代碼
     * @return string
     */
    public function getCode()
    {
        return $this->request['code'];
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
            'code' => 'required|string|max:20',
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
            'code.required' => AppManagementCodeConstants::CODE_REQUIRED,
            'code.string'   => AppManagementCodeConstants::CODE_MUST_BE_STRING,
            'code.max'      => AppManagementCodeConstants::CODE_MAX_LENGTH_20,
        ];
    }
}

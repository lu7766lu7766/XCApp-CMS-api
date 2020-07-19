<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 2018/7/6
 * Time: 下午 01:27
 */

namespace Modules\Base\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Base\Exception\ApiErrorCodeException;

abstract class BaseFormRequest extends FormRequest
{
    /**
     * Request args validate rules.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write rule.
     * @return array
     * @see https://laravel.com/docs/master/validation#available-validation-rules
     * checkout this to get more rule keyword info
     */
    abstract public function rules();

    /**
     * Request args validate msg on fail.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write message.
     * @return array
     * @see https://laravel.com/docs/master/validation#customizing-the-error-messages
     * checkout this to get more message info
     * @see https://laravel.com/docs/master/validation#working-with-error-messages
     * checkout this to get more message info
     */
    public function messages()
    {
        return parent::messages();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @param Validator $validator
     * @throws ApiErrorCodeException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new ApiErrorCodeException($validator->getMessageBag()->all());
    }
}

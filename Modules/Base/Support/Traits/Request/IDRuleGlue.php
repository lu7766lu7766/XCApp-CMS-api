<?php
/**
 * Created by PhpStorm.
 * User: House
 * Date: 2018/9/27
 * Time: 下午 04:49
 */

namespace Modules\Base\Support\Traits\Request;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;

trait IDRuleGlue
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->get('id', 0);
    }

    /**
     * Request args validate rules.
     * @link https://laravel.com/docs/master/validation lookup link and know how to write rule.
     * @return array
     * @see https://laravel.com/docs/master/validation#available-validation-rules
     * checkout this to get more rule keyword info
     */
    public function rules()
    {
        return [
            'id' => 'required|integer'
        ];
    }

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
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.integer'  => HttpAttributeInvalidCode::ID_BE_INTEGER
        ];
    }
}

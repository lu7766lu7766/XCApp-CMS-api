<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/15
 * Time: 下午 02:46
 */

namespace Modules\AppAutomation\Http\Requests;

use Modules\Base\Constants\ApiCode\AppAutomation90000\AppAutomationCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AppAutomationDelRequest extends HandleInvalidRequest
{
    public function getId(): array
    {
        return $this->request['id'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'   => 'required|array',
            'id.*' => 'integer'
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.required'  => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.array'     => AppAutomationCodeConstants::ID_MUST_BE_ARRAY,
            'id.*.integer' => HttpAttributeInvalidCode::ID_BE_INTEGER
        ];
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/16
 * Time: 上午 11:30
 */

namespace Modules\AppAutomation\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AppAutomationMakeApkRequest extends HandleInvalidRequest
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->request['id'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id' => 'required|integer'
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED
        ];
    }
}

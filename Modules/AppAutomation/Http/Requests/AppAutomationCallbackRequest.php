<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/14
 * Time: 下午 05:08
 */

namespace Modules\AppAutomation\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\AppAutomation\Constants\PlatformConstants;
use Modules\Base\Constants\ApiCode\AppAutomation90000\AppAutomationCodeConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AppAutomationCallbackRequest extends HandleInvalidRequest
{
    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->request['uuid'];
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->request['result'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'uuid'              => 'required|alpha_dash|size:36',
            'result'            => 'sometimes|array',
            'result.*.link'     => 'sometimes|url',
            'result.*.platform' => 'sometimes|' . Rule::in(PlatformConstants::enum())
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'uuid' => AppAutomationCodeConstants::UUID_REQUIRED
        ];
    }
}

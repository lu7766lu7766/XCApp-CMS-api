<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/14
 * Time: 下午 04:46
 */

namespace Modules\AppAutomation\Http\Requests;

use Modules\Base\Http\Requests\HandleInvalidRequest;

class AppAutomationDetailRequest extends HandleInvalidRequest
{
    /**
     * @return int
     */
    public function getId()
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
        return [];
    }
}

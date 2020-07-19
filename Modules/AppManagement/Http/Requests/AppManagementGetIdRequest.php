<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/14
 * Time: 下午 03:52
 */

namespace Modules\AppManagement\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class AppManagementGetIdRequest extends HandleInvalidRequest
{
    /**
     * id
     * @return integer
     */
    public function getId()
    {
        return $this->request['id'];
    }

    /**
     * @inheritdoc
     */
    protected function rules()
    {
        return [
            'id' => 'required|integer',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function messages()
    {
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.integer'  => HttpAttributeInvalidCode::ID_BE_INTEGER,
        ];
    }
}

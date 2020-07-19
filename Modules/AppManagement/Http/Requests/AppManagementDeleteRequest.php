<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/28
 * Time: 下午 05:21
 */

namespace Modules\AppManagement\Http\Requests;

use Modules\Base\Constants\ApiCode\AppManagement30000\AppManagementCodeConstants;
use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class AppManagementDeleteRequest extends BaseFormRequest
{
    /**
     * id
     * @return array
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'   => 'required|array',
            'id.*' => 'integer',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.required'  => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.array'     => AppManagementCodeConstants::ID_MUST_BE_ARRAY,
            'id.*.integer' => HttpAttributeInvalidCode::ID_BE_INTEGER,
        ];
    }
}

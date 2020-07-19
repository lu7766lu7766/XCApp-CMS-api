<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/6/6
 * Time: 下午 01:43
 */

namespace Modules\IpManagement\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Constants\ApiCode\IpManagement100000\IpManagementCodeConstants;
use Modules\Base\Http\Requests\HandleInvalidRequest;

class IpManagementDelRequest extends HandleInvalidRequest
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
            'id.array'     => IpManagementCodeConstants::ID_MUST_BE_ARRAY,
            'id.*.integer' => HttpAttributeInvalidCode::ID_BE_INTEGER,
        ];
    }
}

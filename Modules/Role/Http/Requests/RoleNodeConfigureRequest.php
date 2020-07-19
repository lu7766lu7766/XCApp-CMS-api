<?php

namespace Modules\Role\Http\Requests;

use Modules\Base\Constants\ApiCode\HttpAttributeInvalidCode;
use Modules\Base\Http\Requests\BaseFormRequest;

class RoleNodeConfigureRequest extends BaseFormRequest
{
    /**
     * Role Id
     * @return int
     */
    public function getId()
    {
        return $this->get('id');
    }

    /**
     * Node Id & permission.
     * @return array
     */
    public function getNodes()
    {
        return $this->get('nodes', []);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'id'                 => 'required|integer',
            'nodes'              => 'sometimes|required|array',
            'nodes.*.id'         => 'required|integer',
            'nodes.*.permission' => 'required|integer|between:0,15',
        ];
    }

    /**
     * @inheritdoc
     */
    public function messages()
    {
        return [
            'id.required' => HttpAttributeInvalidCode::ID_REQUIRED,
            'id.integer'  => HttpAttributeInvalidCode::ID_BE_INTEGER,
            'nodes'       => HttpAttributeInvalidCode::NODES_BE_ARRAY,
        ];
    }
}

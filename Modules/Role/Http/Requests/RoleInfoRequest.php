<?php

namespace Modules\Role\Http\Requests;

use Modules\Base\Http\Requests\HandleInvalidRequest;
use Modules\Base\Support\Traits\Request\IDRuleGlue;

class RoleInfoRequest extends HandleInvalidRequest
{
    use IDRuleGlue;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->request['id'];
    }
}

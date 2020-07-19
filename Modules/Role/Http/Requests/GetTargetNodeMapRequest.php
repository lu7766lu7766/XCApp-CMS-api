<?php

namespace Modules\Role\Http\Requests;

use Modules\Base\Http\Requests\BaseFormRequest;
use Modules\Base\Support\Traits\Request\IDRuleGlue;

class GetTargetNodeMapRequest extends BaseFormRequest
{
    use IDRuleGlue;
}

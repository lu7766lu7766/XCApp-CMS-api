<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/28
 * Time: 下午 03:59
 */

namespace Modules\AppAutomation\Rules\Notify;

use App\Contract\Laravel\Validation\IDescription;

abstract class AbstractRules implements IDescription
{
    /**
     * @return array
     */
    public function messages(): array
    {
        return [];
    }
}

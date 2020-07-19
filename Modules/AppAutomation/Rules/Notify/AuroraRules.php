<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/28
 * Time: 下午 04:01
 */

namespace Modules\AppAutomation\Rules\Notify;

class AuroraRules extends AbstractRules
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'app_key' => 'required|string',
            'secret'  => 'required|string'
        ];
    }
}

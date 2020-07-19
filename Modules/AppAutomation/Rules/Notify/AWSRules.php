<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/28
 * Time: 下午 03:58
 */

namespace Modules\AppAutomation\Rules\Notify;

class AWSRules extends AbstractRules
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return ['app_key' => 'required|string'];
    }
}

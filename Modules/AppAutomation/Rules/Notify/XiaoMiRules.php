<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 2019/5/28
 * Time: 下午 04:03
 */

namespace Modules\AppAutomation\Rules\Notify;

class XiaoMiRules extends AbstractRules
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'app_id'  => 'required|string',
            'app_key' => 'required|string'
        ];
    }
}

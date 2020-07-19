<?php

namespace Modules\Account\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Base\Http\Controllers\BaseController;

class PasswordController extends BaseController
{
    /**
     * Account list.
     * @return array
     */
    public function reset(Request $request)
    {
        return $request->user();
    }
}

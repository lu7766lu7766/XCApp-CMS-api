<?php

namespace Modules\Account\Http\Controllers;

use Modules\Account\Http\Requests\MemberAccountCreateRequest;
use Modules\Account\Service\MemberAccountService;
use Modules\Base\Http\Controllers\BaseController;

class MemberAccountController extends BaseController
{
    /**
     * Create a member role account.
     * @param MemberAccountCreateRequest $request
     * @return \Modules\Account\Entities\Account|null
     */
    public function create(MemberAccountCreateRequest $request)
    {
        $service = MemberAccountService::getInstance();
        $result = $service->create($request);

        return $result;
    }
}

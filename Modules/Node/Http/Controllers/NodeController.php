<?php

namespace Modules\Node\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\Routing\Controller;
use Modules\Node\Service\NodeService;

class NodeController extends Controller
{
    /**
     * @param AuthManager $auth
     * @return array
     */
    public function tree(AuthManager $auth)
    {
        $service = new NodeService();
        $result = $service->nodeMap($auth->guard()->user()->getAuthIdentifier());

        return $result;
    }
}

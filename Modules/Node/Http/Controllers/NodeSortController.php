<?php

namespace Modules\Node\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Modules\Base\Http\Controllers\BaseController;
use Modules\Node\Entities\NodeSort;
use Modules\Node\Http\Requests\NodeSortSaveRequest;
use Modules\Node\Service\NodeService;

class NodeSortController extends BaseController
{
    /**
     * @param AuthManager $auth
     * @return NodeSort|null
     */
    public function index(AuthManager $auth)
    {
        $service = new NodeService();
        $result = $service->sortInfo($auth->guard()->user()->getAuthIdentifier());

        return $result;
    }

    /**
     * @param NodeSortSaveRequest $request
     * @param AuthManager $auth
     * @return NodeSort|null
     */
    public function save(NodeSortSaveRequest $request, AuthManager $auth)
    {
        $service = new NodeService();
        $result = $service->saveSort(
            $request->getSort(),
            $auth->guard()->user()
        );

        return $result;
    }
}

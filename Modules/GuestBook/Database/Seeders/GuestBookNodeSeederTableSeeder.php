<?php

namespace Modules\GuestBook\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class GuestBookNodeSeederTableSeeder extends Seeder
{
    /**
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function run()
    {
        $nodeCodes = [
            'GUEST_BOOK_MG' => 'GUEST_BOOK_MG',
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display_name' => '留言管理',
                    'code'         => $nodeCodes['GUEST_BOOK_MG'],
                    'route_uri'    => 'guest_book'
                ]
            ]
        ]);
        $nodeService = NodeEditService::getInstance();
        $nodeService->batchCreateBindRoles(
            $request,
            RoleInherentConstants::internal(),
            MethodPermissionConstants::FULL()
        );
    }
}

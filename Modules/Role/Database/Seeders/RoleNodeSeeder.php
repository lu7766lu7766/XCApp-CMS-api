<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\PermissionValueConstants;
use Modules\Role\Constants\RoleInherentConstants;

class RoleNodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function run()
    {
        $nodeCodes = [
            'ROLE_SETTING' => 'ROLE_SETTING',
            'WEB_MG'       => 'WEB_MG'
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display_name' => '系统设置',
                    'code'         => $nodeCodes['WEB_MG']
                ],
                [
                    'display_name' => '角色设定',
                    'code'         => $nodeCodes['ROLE_SETTING'],
                    'route_uri'    => 'role/maintain',
                    'parent_code'  => $nodeCodes['WEB_MG']
                ]
            ]
        ]);
        $nodeService = NodeEditService::getInstance();
        $nodeService->batchCreateBindRoles(
            $request,
            RoleInherentConstants::internal(),
            PermissionValueConstants::FULL()
        );
    }
}

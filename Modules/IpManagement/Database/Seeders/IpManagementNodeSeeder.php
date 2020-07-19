<?php

namespace Modules\IpManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class IpManagementNodeSeeder extends Seeder
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
            'IP_MG'   => 'IP_MG',
            'IP_INFO' => 'IP_INFO'
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display_name' => 'IP管理',
                    'code'         => $nodeCodes['IP_MG'],
                    'route_uri'    => 'ip_management/maintain',
                ],
                [
                    'display'      => NYEnumConstants::NO,
                    'display_name' => 'IP資訊',
                    'code'         => $nodeCodes['IP_INFO'],
                    'route_uri'    => 'ip_info/maintain',
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

<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class AccountNodeSeeder extends Seeder
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
            'WEB_MG' => 'WEB_MG',
            'ACC_ST' => 'ACC_ST',
            'ACC_MY' => 'ACC_MY',
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display_name' => '系统设置',
                    'code'         => $nodeCodes['WEB_MG']
                ],
                [
                    'display_name' => '帐号管理',
                    'code'         => $nodeCodes['ACC_ST'],
                    'route_uri'    => 'account/maintain',
                    'parent_code'  => $nodeCodes['WEB_MG']
                ],
                [
                    'display'      => NYEnumConstants::NO,
                    'display_name' => '个人帐号管理',
                    'code'         => $nodeCodes['ACC_MY'],
                    'route_uri'    => 'account/self',
                    'parent_code'  => $nodeCodes['WEB_MG']
                ],
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

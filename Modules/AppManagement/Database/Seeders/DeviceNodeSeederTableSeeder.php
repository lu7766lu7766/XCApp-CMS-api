<?php

namespace Modules\AppManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class DeviceNodeSeederTableSeeder extends Seeder
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
            'APP_DEVICE'  => 'APP_DEVICE',
            'APP_SETTING' => 'APP_SETTING',
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display'      => NYEnumConstants::NO,
                    'display_name' => 'APP裝置',
                    'code'         => $nodeCodes['APP_DEVICE'],
                    'route_uri'    => 'app_setting/device',
                    'parent_code'  => $nodeCodes['APP_SETTING']
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

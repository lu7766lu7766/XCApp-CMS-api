<?php

namespace Modules\PushNotification\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class PushNotificationNodeSeeder extends Seeder
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
            'PSH_NOTI' => 'PSH_NOTI',
        ];
        $rootUrl = 'pushnotification';
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display_name' => '讯息推播',
                    'code'         => $nodeCodes['PSH_NOTI'],
                    'route_uri'    => $rootUrl . '/message',
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

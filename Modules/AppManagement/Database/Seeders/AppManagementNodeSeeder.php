<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/20
 * Time: 下午 12:13
 */

namespace Modules\AppManagement\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class AppManagementNodeSeeder extends Seeder
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
            'APP_MG'      => 'APP_MG',
            'APP_SETTING' => 'APP_SETTING',
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display_name' => 'APP管理',
                    'code'         => $nodeCodes['APP_MG'],
                    'route_uri'    => 'app_management/data_manipulation',
                ],
                [
                    'display_name' => 'APP设定',
                    'code'         => $nodeCodes['APP_SETTING'],
                    'route_uri'    => 'app_setting/data_manipulation',
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

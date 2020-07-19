<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/9/20
 * Time: 下午 12:13
 */

namespace Modules\AppAutomation\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class AppAutomationNodeSeeder extends Seeder
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
            'APP_AUTO' => 'APP_AUTO'
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display_name' => 'APP自动生成',
                    'code'         => $nodeCodes['APP_AUTO'],
                    'route_uri'    => 'app_automation/maintain',
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

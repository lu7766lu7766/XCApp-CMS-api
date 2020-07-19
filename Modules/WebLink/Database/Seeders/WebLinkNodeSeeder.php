<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/1
 * Time: 下午 02:21
 */

namespace Modules\WebLink\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class WebLinkNodeSeeder extends Seeder
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
            'WEB_LINK_MG'       => 'WEB_LINK_MG',
            'WEB_LINK_CATEGORY' => 'WEB_LINK_CATEGORY',
            'WEB_LINK'          => 'WEB_LINK',
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display_name' => '网站连结',
                    'code'         => $nodeCodes['WEB_LINK_MG']
                ],
                [
                    'display_name' => '连结分类',
                    'code'         => $nodeCodes['WEB_LINK_CATEGORY'],
                    'route_uri'    => 'web_link/category',
                    'parent_code'  => $nodeCodes['WEB_LINK_MG']
                ],
                [
                    'display_name' => '连结管理',
                    'code'         => $nodeCodes['WEB_LINK'],
                    'route_uri'    => 'web_link',
                    'parent_code'  => $nodeCodes['WEB_LINK_MG']
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

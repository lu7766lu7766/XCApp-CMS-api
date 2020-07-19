<?php

namespace Modules\News\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class NewsNodeSeederTableSeeder extends Seeder
{
    /**
     * @throws \Modules\Base\Exception\ApiErrorCodeException
     */
    public function run()
    {
        $nodeCodes = [
            'NEWS'     => 'NEWS',
            'NEW_TYPE' => 'NEW_TYPE',
            'NEW_MG'   => 'NEW_MG'
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display_name' => '新闻消息',
                    'code'         => $nodeCodes['NEWS'],
                ],
                [
                    'display_name' => '新闻分类',
                    'code'         => $nodeCodes['NEW_TYPE'],
                    'parent_code'  => $nodeCodes['NEWS'],
                    'route_uri'    => 'news_category/maintain',
                ],
                [
                    'display_name' => '新闻管理',
                    'code'         => $nodeCodes['NEW_MG'],
                    'parent_code'  => $nodeCodes['NEWS'],
                    'route_uri'    => 'news_management/maintain',
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

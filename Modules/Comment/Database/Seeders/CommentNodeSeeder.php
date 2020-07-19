<?php
/**
 * Created by PhpStorm.
 * User: funny
 * Date: 2018/10/31
 * Time: 下午 05:12
 */

namespace Modules\Comment\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Base\Constants\NYEnumConstants;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Modules\Permission\Constants\MethodPermissionConstants;
use Modules\Role\Constants\RoleInherentConstants;

class CommentNodeSeeder extends Seeder
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
            'COMMENT' => 'COMMENT',
        ];
        $request = NodeCreateRequest::getHandle([
            'nodes' => [
                [
                    'display'      => NYEnumConstants::NO,
                    'display_name' => '评论管理',
                    'code'         => $nodeCodes['COMMENT'],
                    'route_uri'    => 'comment',
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

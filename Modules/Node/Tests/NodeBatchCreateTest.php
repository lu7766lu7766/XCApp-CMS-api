<?php

namespace Modules\Node\Tests;

use Modules\Base\Exception\ApiErrorCodeException;
use Modules\Node\Http\Requests\NodeCreateRequest;
use Modules\Node\Service\NodeEditService;
use Tests\TestCase;

class NodeBatchCreateTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        \DB::enableQueryLog();
        // 相依物件
        try {
            $dependObj = NodeCreateRequest::getHandle([
                'nodes' => [
                    [
                        'display_name' => '測試節點',
                        'code'         => 'TEST_NODE',
                        'route_uri'    => 'node/test'
                    ],
                    [
                        'display_name' => '測試節點1',
                        'code'         => 'TEST_NODE1'
                    ],
                ]
            ]);
        } catch (ApiErrorCodeException $e) {
            var_export($e->getCodes());
            exit();
        }
        // 待測物件
        $targetObj = NodeEditService::getInstance();
        // 期望值
        $expected = ['測試節點' => true, '測試節點1' => true];
        // 實際值
        $actual = $targetObj->batchCreateBindRoles($dependObj);
//        dd($actual, \DB::getQueryLog());
        $this->assertEquals($expected, $actual);
    }
}

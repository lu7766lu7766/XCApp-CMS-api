<?php
/**
 * Created by PhpStorm.
 * User: derek
 * Date: 2018/9/14
 * Time: 下午 03:53
 */

namespace Modules\PushNotification\Tests;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Modules\PushNotification\Entities\PushNotification;
use Modules\PushNotification\Service\PushNotificationService;
use Tests\TestCase;

class PushNotificationTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;
    private $url = '/pushnotification/';

    public function login()
    {
        $post = [
            'grant_type'    => 'password',
            'client_id'     => 'fc33cf1f-9af0-4c2f-a3cd-5414d124bf69',
            'client_secret' => 'aGzl64ixGXkezWc61U4KXmaQzANAJf3lIeAxDefk',
            'username'      => 'admin',
            'password'      => 'nameis9527',
        ];
        $response = $this->call('POST', '/passport/token/', $post);
        $content = $response->content();
        $content = json_decode($content, true);
        $accessToken = $content['access_token'];
        $header = ['Authorization' => 'Bearer ' . $accessToken];
        $this->get('/account/maintain/', $header);
    }

    /** @test */
    public function push()
    {
        /** @var  PushNotificationService $push */
        $push = \App::make(PushNotificationService::class);
        $topic_id = 'arn:aws:sns:ap-southeast-1:748166261271:XinjiangFuturesDev';
        $push->pushMessageToSNS('test', $topic_id);
//        /** @var PushNotificationService $push */
//        $push = \App::make(PushNotificationService::class);
//        $push->pushMessage('213');
    }

//    /** @test */
//    public function delete()
//    {
//        $this->login();
//        $postBody = ['id' => 4];
//        $response = $this->call('delete', $this->url, $postBody);
//        $this->assertEquals(200, $response->status());
//        $this->checkCodeSuccess($this->formatResponse($response));
//    }
//
//    /** @test */
//    public function put()
//    {
//        $this->login();
//        $postBody = ['id' => 4, 'content' => 'this is test'];
//        $response = $this->call('PUT', $this->url, $postBody);
//        $this->assertEquals(200, $response->status());
//        $this->checkCodeSuccess($this->formatResponse($response));
//    }
//
//    /** @test */
//    public function show()
//    {
//        $this->login();
//        $postBody = ['id' => 4];
//        $response = $this->call('GET', $this->url . 'edit', $postBody);
//        $this->assertEquals(200, $response->status());
//        $this->checkCodeSuccess($this->formatResponse($response));
//    }
//
//    /** @test */
//    public function store()
//    {
//        $this->login();
//        $postBody = ['content' => 3123123];
//        $response = $this->call('POST', $this->url, $postBody);
//        $this->assertEquals(200, $response->status());
//        $this->checkCodeSuccess($this->formatResponse($response));
//    }
//
//    /** @test */
//    public function list()
//    {
//        $this->login();
//        $postBody = ['page' => 1, 'perpage' => 20];
//        $response = $this->call('GET', $this->url, $postBody);
//        $this->assertEquals(200, $response->status());
//        $this->checkCodeSuccess($this->formatResponse($response));
//    }
//
//    /**
//     * @param array $content
//     */
//    public function checkCodeSuccess(array $content)
//    {
//        $this->assertEquals(200, $content['code']);
//    }
//
//    /**
//     * @param $response
//     * @return array
//     */
//    public function formatResponse($response)
//    {
//        return json_decode($response->content(), true);
//    }
}

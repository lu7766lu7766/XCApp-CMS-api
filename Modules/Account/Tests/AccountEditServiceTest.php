<?php

namespace Modules\Account\Tests;

use Modules\Account\Service\AccountEditService;
use Tests\TestCase;

class AccountEditServiceTest extends TestCase
{
    /**
     * 測試新增帳號
     */
    public function testCreate()
    {
        $service = AccountEditService::getInstance([
            'account'      => 'house',
            'password'     => 'house1234',
            'display_name' => 'housebombom',
            'mail'         => 'house@house.cc',
            'phone'        => '3939889',
        ]);
        $account = $service->create();
        $this->assertTrue(is_object($account));
    }

    /**
     * 測試更新帳號
     */
    public function testUpdate()
    {
        $service = AccountEditService::getInstance([
            'id'           => 1,
            'account'      => 'house',
            'password'     => 'house1234',
            'display_name' => 'housewawa',
            'mail'         => 'house@house.cc',
            'phone'        => '3939889',
        ]);
        $account = $service->update();
        $this->assertTrue(is_object($account));
    }
}

<?php

namespace Modules\Permission\Tests;

use Modules\Permission\Repository\AccountNodePermissionRepo;
use Tests\TestCase;

class AccountNodePermissionRepoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        \DB::enableQueryLog();
        $repo = new AccountNodePermissionRepo();
        $result = $repo->findAccountWithPermission(1, 'account/maintain', 4);
        var_export([\DB::getQueryLog(), $result]);
        $this->assertTrue(true);
    }
}

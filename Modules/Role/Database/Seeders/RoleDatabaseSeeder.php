<?php

namespace Modules\Role\Database\Seeders;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Seeder;
use Modules\Role\Constants\RoleInherentConstants;
use Modules\Role\Scope\RoleScope;
use Modules\Role\Service\RoleEditService;

class RoleDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new class implements Authenticatable
        {
            use \Illuminate\Auth\Authenticatable;

            public function getAuthIdentifier()
            {
                return 1;
            }
        };
        $service = RoleEditService::getInstance($admin, RoleScope::getInstance());
        $service->edit('超級管理員', RoleInherentConstants::ADMIN, 'N');
        $service->edit('系統管理員', RoleInherentConstants::SYSTEM_MANAGER);
        $service->edit('會員', RoleInherentConstants::CUSTOM, 'Y', 'Y');
    }
}

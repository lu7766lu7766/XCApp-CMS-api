<?php

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Migrations\Migration;
use Modules\Role\Constants\RoleInherentConstants;
use Modules\Role\Entities\Role;
use Modules\Role\Scope\RoleScope;
use Modules\Role\Service\RoleEditService;

class DataAddMemberRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Role::where('code', RoleInherentConstants::MEMBER)->exists()) {
            $admin = new class implements Authenticatable
            {
                use \Illuminate\Auth\Authenticatable;

                public function getAuthIdentifier()
                {
                    return 1;
                }
            };
            $service = RoleEditService::getInstance($admin, RoleScope::getInstance());
            $service->edit('會員', RoleInherentConstants::MEMBER, 'Y', 'N');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!is_null($role = Role::where('code', RoleInherentConstants::MEMBER)->first())) {
            try {
                $role->forceDelete();
            } catch (Exception $e) {
            }
        }
    }
}

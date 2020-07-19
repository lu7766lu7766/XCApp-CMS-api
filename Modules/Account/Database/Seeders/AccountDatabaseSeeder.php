<?php

namespace Modules\Account\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Account\Repository\AccountEditRepo;
use Modules\Account\Service\AccountEditService;
use Modules\Role\Constants\RoleInherentConstants;
use Modules\Role\Entities\Role;

class AccountDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @throws \Throwable
     */
    public function run()
    {
        $adminRole = Role::where('code', 'ADMIN')->first();
        $systemManager = Role::where('code', RoleInherentConstants::SYSTEM_MANAGER)->first();
        $systemManagerId = (string)$systemManager->getKey();
        $service = AccountEditService::getInstance([]);
        $admin = app(AccountEditRepo::class)->create([
            'account'      => 'admin',
            'password'     => Hash::make('nameis9527'),
            'display_name' => '最高權限者',
            'mail'         => 'admin@house.cc',
            'phone'        => '3939889',
            'status'       => 'enable'
        ]);
        $admin->roles()->sync([$adminRole->getKey()]);
        $sampleAccount = [
            'account'          => '',
            'password'         => '',
            'confirm_password' => '',
            'display_name'     => '管理員',
            'mail'             => '@house.cc',
            'phone'            => '3939889',
            'role_id'          => [$systemManagerId],
            'status'           => 'enable'
        ];
        $addUserList = [
            'house',
            'aaron',
            'jacc',
            'funny',
            'derek',
            'xced',
            'arxing',
            'yanchen',
            'water'
        ];
        foreach ($addUserList as $user) {
            $sampleAccount['account'] = $user;
            $sampleAccount['password'] = $user . 'is666';
            $sampleAccount['confirm_password'] = $user . 'is666';
            $sampleAccount['display_name'] = '系统管理员';
            $sampleAccount['mail'] = $user . '@house.cc';
            $service->setData($sampleAccount);
            $service->create($admin->getKey());
        }
    }
}

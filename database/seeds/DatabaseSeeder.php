<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\Account\Database\Seeders\AccountDatabaseSeeder;
use Modules\Account\Database\Seeders\AccountNodeSeeder;
use Modules\AppAutomation\Database\Seeders\AppAutomationNodeSeeder;
use Modules\AppManagement\Database\Seeders\AppManagementNodeSeeder;
use Modules\AppManagement\Database\Seeders\DeviceNodeSeederTableSeeder;
use Modules\Comment\Database\Seeders\CommentNodeSeeder;
use Modules\GuestBook\Database\Seeders\GuestBookNodeSeederTableSeeder;
use Modules\News\Database\Seeders\NewsNodeSeederTableSeeder;
use Modules\Passport\Database\Seeders\PassportDatabaseSeeder;
use Modules\PushNotification\Database\Seeders\PushNotificationNodeSeeder;
use Modules\Role\Database\Seeders\RoleDatabaseSeeder;
use Modules\Role\Database\Seeders\RoleNodeSeeder;
use Modules\WebLink\Database\Seeders\WebLinkNodeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::reguard();
        // first : no relation seeder.
        $this->call(RoleDatabaseSeeder::class);
        // second : your define seeder.
        $this->call(AccountDatabaseSeeder::class);
        $this->call(RoleNodeSeeder::class);
        $this->call(AccountNodeSeeder::class);
        $this->call(PassportDatabaseSeeder::class);
        $this->call(AppManagementNodeSeeder::class);
        $this->call(PushNotificationNodeSeeder::class);
        $this->call(WebLinkNodeSeeder::class);
        $this->call(NewsNodeSeederTableSeeder::class);
        $this->call(RoleNodeSeeder::class);
        $this->call(GuestBookNodeSeederTableSeeder::class);
        $this->call(CommentNodeSeeder::class);
        $this->call(DeviceNodeSeederTableSeeder::class);
        $this->call(AppAutomationNodeSeeder::class);
    }
}

<?php

namespace Modules\PushNotification\Database\Seeders;

use Illuminate\Database\Seeder;

class PushNotificationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PushNotificationNodeSeeder::class);
    }
}

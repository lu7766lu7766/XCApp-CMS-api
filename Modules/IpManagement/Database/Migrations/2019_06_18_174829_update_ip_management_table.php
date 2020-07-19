<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIpManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ip_management', function (Blueprint $table) {
            $table->unique(['ip', 'device'], 'ip_management_ip_device_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ip_management', function (Blueprint $table) {
            $table->dropUnique('ip_management_ip_device_unique');
        });
    }
}

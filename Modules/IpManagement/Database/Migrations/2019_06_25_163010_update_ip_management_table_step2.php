<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIpManagementTableStep2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ip_management', function (Blueprint $table) {
            $table->dropIndex('ip_management_ip_index');
            $table->dropSoftDeletes();
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
            $table->index(['ip'], 'ip_management_ip_index');
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAppManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_management', function (Blueprint $table) {
            $table->unsignedInteger('account_id')->default(1)->comment('創建者ID');
            $table->foreign('account_id', 'fk_app_management_account_id')
                ->references('id')->on('account')->onDelete('cascade');
            $table->dropUnique('app_management_code_unique');
            $table->unique(['account_id', 'code'], 'app_management_code_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}

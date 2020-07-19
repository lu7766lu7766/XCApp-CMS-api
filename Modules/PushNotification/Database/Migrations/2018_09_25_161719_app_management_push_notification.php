<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppManagementPushNotification extends Migration
{
    private $table = 'app_management_push_notification';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('app_management_id')->comment('APP 管理 id');
            $table->unsignedInteger('push_notification_id')->comment('推播管理 id');
            $table->foreign('app_management_id', 'fk_app_management_push_notification_app_management_id')
                ->references('id')->on('app_management')->onDelete('cascade');
            $table->foreign('push_notification_id', 'fk_app_management_push_notification_push_notification_id')
                ->references('id')->on('push_notification')->onDelete('cascade');
            $table->timestamps();
            //index
            $table->index(['push_notification_id', 'app_management_id'], 'idx_notification_id_management_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($this->table);
        DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

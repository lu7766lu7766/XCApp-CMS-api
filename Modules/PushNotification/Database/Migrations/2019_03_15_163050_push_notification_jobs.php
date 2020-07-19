<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PushNotificationJobs extends Migration
{
    private $table = 'push_notification_jobs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->unsignedInteger('push_notification_id');
            $table->unsignedBigInteger('jobs_id');
            //index
            $table->index(['push_notification_id', 'jobs_id'], 'idx_push_notification_id_jobs_id');
            //foreign
            $table->foreign('push_notification_id', 'fk_push_notification_id_jobs_id')
                ->references('id')->on('push_notification')->onDelete('cascade');
            $table->foreign('jobs_id', 'fk_jobs_id_push_notification_id')
                ->references('id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}

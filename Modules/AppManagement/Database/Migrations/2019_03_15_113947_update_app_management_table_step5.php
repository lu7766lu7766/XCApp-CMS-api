<?php

use Illuminate\Database\Migrations\Migration;

class UpdateAppManagementTableStep5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::connection()->statement(
            "ALTER TABLE app_management " .
            "MODIFY COLUMN  push_path ENUM('aws','aurora','xiaomi') DEFAULT 'aws' NOT NULL COMMENT '推播通道'"
        );
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

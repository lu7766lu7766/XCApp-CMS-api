<?php

use Illuminate\Database\Migrations\Migration;
use Modules\AppManagement\Constants\PushPathConstants;

class UpdateAppManagementTableStep6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $enum = "'" . PushPathConstants::implodeEnum("','") . "'";
        \DB::connection()->statement(
            "ALTER TABLE app_management " .
            "MODIFY COLUMN  push_path ENUM({$enum}) DEFAULT 'aws' NOT NULL COMMENT '推播通道'"
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

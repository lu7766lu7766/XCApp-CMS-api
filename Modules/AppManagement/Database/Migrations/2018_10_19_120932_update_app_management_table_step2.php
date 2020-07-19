<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\AppManagement\Constants\PushPathConstants;

class UpdateAppManagementTableStep2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_management', function (Blueprint $table) {
            $table->enum('push_path', PushPathConstants::enum())
                ->default(PushPathConstants::AWS)
                ->comment('推播通道');
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

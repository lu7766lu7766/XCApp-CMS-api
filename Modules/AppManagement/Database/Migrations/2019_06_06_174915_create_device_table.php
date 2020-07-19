<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identify', 255)->comment('識別碼');
            $table->unsignedInteger('app_id')->comment('app_management Id');
            $table->timestamps();
            $table->unique(['app_id', 'identify'], 'app_id_identify_unique');
            $table->foreign('app_id', 'fk_device_app_management_id')
                ->references('id')->on('app_management')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AppRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('app_id')->comment('app id');
            $table->unsignedInteger('relation_id')->comment('relation id');
            $table->string('relation_type')->comment('關聯模型');
            $table->foreign('app_id', 'fk_app_relation_app_id')
                ->references('id')->on('app_management')->onDelete('cascade');
            $table->unique(['app_id', 'relation_id', 'relation_type'], 'app_id_relation_id_unique');
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
        Schema::dropIfExists('app_relation');
        DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

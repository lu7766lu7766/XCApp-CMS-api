<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MorphCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morph_counter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('morph_counter_target_id')->comment('被計算的目標id');
            $table->string('morph_counter_type')->comment('關聯模型');
            $table->tinyInteger('morph_counter_kind')->comment('反應種類:1:讚');
            $table->integer('morph_counter')->default(1)->comment('計算反應數');
            //unique
            $table->unique(
                [
                    'morph_counter_target_id',
                    'morph_counter_type',
                    'morph_counter_kind',
                ],
                'morph_counter_target_id_type_kind_unique'
            );
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
        Schema::dropIfExists('morph_counter');
        DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

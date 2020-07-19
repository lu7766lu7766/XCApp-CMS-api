<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCounterTable extends Migration
{
    /**
     * @var string
     */
    private $table = 'counter';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('record')->default(1)->comment('瀏覽次數');
            $table->unsignedInteger('relative_id')->comment('多態關聯ID');
            $table->string('relative_type')->comment('多態關聯model->model');
            $table->unique([
                'relative_id',
                'relative_type'
            ], 'counter_relative_id_relative_type_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists($this->table);
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

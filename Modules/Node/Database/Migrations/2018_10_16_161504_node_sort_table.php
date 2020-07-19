<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NodeSortTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_sort', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id')->comment('帳號id');
            $table->json('sort')->nullable()->comment('排序');
            $table->timestamps();
            //foreign
            $table->foreign('account_id', 'fk_node_sort_account_id')
                ->references('id')->on('account')->onDelete('cascade');
            // index
            $table->unique('account_id', 'node_account_id_unique');
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
        Schema::dropIfExists('node_sort');
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

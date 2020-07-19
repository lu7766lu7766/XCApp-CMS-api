<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleNodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_node', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id')->comment('角色id');
            $table->unsignedInteger('node_id')->comment('節點id');
            $table->unsignedTinyInteger('method_permission')
                ->comment('RESTFul api method permission. see MethodPermissionConstants class');
            $table->timestamps();
            // index
            $table->foreign('role_id', 'fk_role_node_role_id')->references('id')->on('role')->onDelete('cascade');
            $table->foreign('node_id', 'fk_role_node_node_id')->references('id')->on('node')->onDelete('cascade');
            $table->index(['role_id', 'node_id'], 'idx_role_node_role_node');
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
        Schema::dropIfExists('role_node');
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

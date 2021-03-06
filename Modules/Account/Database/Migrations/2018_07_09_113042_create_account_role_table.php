<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_role', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('role_id');
            $table->timestamps();
            // index
            $table->foreign('account_id', 'fk_account_role_account_id')->references('id')->on('account')->onDelete('cascade');
            $table->foreign('role_id', 'fk_account_role_role_id')->references('id')->on('role')->onDelete('cascade');
            $table->index(['account_id', 'role_id'], 'idx_account_role_account_role');
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
        Schema::dropIfExists('account_role');
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

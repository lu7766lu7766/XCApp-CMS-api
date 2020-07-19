<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AccountReactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_reaction', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('account_reaction_kind')->comment('反應種類:1:讚');
            $table->integer('account_reaction_target_id')->comment('被反應的目標id');
            $table->unsignedInteger('account_id')->comment('帳號id');
            $table->string('account_reaction_type')->comment('關聯模型');
            //foreign
            $table->foreign('account_id', 'fk_reaction_account_id')
                ->references('id')->on('account')->onDelete('cascade');
            //unique
            $table->unique(
                [
                    'account_id',
                    'account_reaction_target_id',
                    'account_reaction_type',
                    'account_reaction_kind',
                ],
                'account_reaction_kind_target_account_type_unique'
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
        Schema::dropIfExists('account_reaction');
        DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

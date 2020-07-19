<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('theme_id')->comment('主題id');
            $table->unsignedInteger('account_id')->comment('帳號id');
            $table->text('message')->comment('評論訊息');
            $table->string('comment_type')->comment('關聯模型');
            $table->timestamps();
            //index
            $table->index(['theme_id', 'comment_type'], 'idx_comment_theme_id_type');
            //foreign
            $table->foreign('account_id', 'fk_comment_account_id')
                ->references('id')->on('account')->onDelete('cascade');
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
        Schema::dropIfExists('comment');
        DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

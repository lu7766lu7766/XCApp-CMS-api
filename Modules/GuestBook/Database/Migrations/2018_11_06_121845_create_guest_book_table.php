<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('標題');
            $table->text('content')->comment('內容');
            $table->unsignedInteger('account_id')->comment('發表者');
            $table->timestamps();
            //foreign
            $table->foreign('account_id', 'fk_guest_book_account_id')
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
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('guest_book');
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

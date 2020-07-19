<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\CommonStatusConstants;

class WebLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_link', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30)->comment('名稱');
            $table->unsignedInteger('category_id')->comment('類別ID');
            $table->string('url_link')->comment('網址');
            $table->enum('status', CommonStatusConstants::enum())->comment('狀態:enable:啟用,disable:關閉');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id',
                'fk_web_link_category_id')->references('id')->on('web_link_category')->onDelete('cascade');
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
        Schema::dropIfExists('web_link');
        DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

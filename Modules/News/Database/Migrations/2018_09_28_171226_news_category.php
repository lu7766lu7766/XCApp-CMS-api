<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\NYEnumConstants;

class NewsCategory extends Migration
{
    private $table = 'news_category';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', NYEnumConstants::enum())
                ->default(NYEnumConstants::NO)->comment('狀態');
            $table->string('name')->comment('列表名稱')->unique();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `news_category` comment '新聞列表'");
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

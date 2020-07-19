<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\NYEnumConstants;

class NewsManagement extends Migration
{
    private $table = 'news_management';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('名稱');
            $table->unsignedInteger('category_id')->comment('新聞分類ID');
            $table->text('content')->comment('內容');
            $table->integer('publish_time')->comment('發佈時間');
            $table->enum('status', NYEnumConstants::enum())
                ->default(NYEnumConstants::NO)->comment('狀態');
            $table->enum('polling', NYEnumConstants::enum())
                ->default(NYEnumConstants::NO)->comment('輪播開關');
            $table->timestamps();
            //foreign key
            $table->foreign('category_id', 'fk_news_category_id')
                ->references('id')->on('news_category')->onDelete('cascade');
            //index
            $table->index(['category_id', 'name'], 'idx_category_id_name');
        });
        DB::statement("ALTER TABLE `news_category` comment '新聞管理'");
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\AppManagement\Constants\CategoryConstants;
use Modules\AppManagement\Constants\MobileDeviceConstants;
use Modules\AppManagement\Constants\StatusConstants;
use Modules\AppManagement\Constants\SwitchConstants;

class AppManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_management', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 20)->comment('代碼');
            $table->string('name', 30)->comment('名稱');
            $table->enum('category', CategoryConstants::enum())->comment('類別');
            $table->enum('mobile_device', MobileDeviceConstants::enum())->comment('行動裝置');
            $table->enum('redirect_switch', SwitchConstants::enum())->comment('跳轉開關');
            $table->json('redirect_url')->nullable()->comment('跳轉網址');
            $table->enum('update_switch', SwitchConstants::enum())->comment('更新開關');
            $table->string('update_url')->nullable()->comment('更新網址');
            $table->text('update_content')->nullable()->comment('更新文字');
            $table->string('qq_id', 30)->nullable()->comment('QQ id');
            $table->string('wechat_id', 30)->nullable()->comment('wechat id');
            $table->string('customer_service', 30)->nullable()->comment('線上客服');
            $table->enum('status', StatusConstants::enum())->comment('狀態');
            $table->string('topic_id')->nullable()->comment('推播用的id');
            $table->timestamps();
            $table->softDeletes();
            //index
            $table->index('name');
            $table->unique('code', 'app_management_code_unique');
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
        Schema::dropIfExists('app_management');
        DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

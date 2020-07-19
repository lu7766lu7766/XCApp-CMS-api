<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\AppAutomation\Constants\StatusConstants;
use Modules\PushNotification\Constants\PushNotificationPlatformsConstants;

class CreateAppAutomation extends Migration
{
    /**@var string */
    private $table = 'app_automation';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->comment('uuid');
            $table->string('code', 20)->comment('代碼');
            $table->string('name', 20)->comment('名稱');
            $table->string('package_name', 40)->comment('包名');
            $table->enum('status', StatusConstants::enum())->comment('狀態');
            $table->text('platform')->comment('平台');
            $table->enum('notify_channel', PushNotificationPlatformsConstants::enum())->comment('推播通道');
            $table->text('config')->comment('配置資訊');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['name']);
            $table->unique('code', 'app_automation_code_unique');
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
        Schema::dropIfExists($this->table);
        DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

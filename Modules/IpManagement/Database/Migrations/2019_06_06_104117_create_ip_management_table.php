<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\AppManagement\Constants\MobileDeviceConstants;
use Modules\Base\Constants\CommonStatusConstants;
use Modules\IpManagement\Constants\TypeConstants;

class CreateIpManagementTable extends Migration
{
    /**@var string */
    private $table = 'ip_management';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip', 64)->comment('ip位址');
            $table->enum('type', TypeConstants::enum())->comment('類型');
            $table->enum('device', MobileDeviceConstants::enum())->comment('裝置');
            $table->enum('status', CommonStatusConstants::enum())->comment('狀態');
            $table->string('remark')->nullable()->comment('備註');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['ip']);
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

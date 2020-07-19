<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\OtpAuth\Constants\OtpAuthStatusConstants;

class OtpAuthTable extends Migration
{
    /** @var string $table */
    private $table = 'otp_auth';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->enum('otp_auth_status', OtpAuthStatusConstants::enum())
                ->default(OtpAuthStatusConstants::PENDING)->comment('狀態');
            $table->string('content')->comment('驗證內容');
            $table->timestamp('expires_at')->nullable()->comment('有效期限');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `otp_auth` comment 'one time password 驗證'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}

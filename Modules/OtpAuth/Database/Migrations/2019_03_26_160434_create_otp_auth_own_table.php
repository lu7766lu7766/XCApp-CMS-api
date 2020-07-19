<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtpAuthOwnTable extends Migration
{
    /** @var string $table */
    private $table = 'otp_auth_own';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->integer('otp_auth_own_model_id', false, true)->comment('多態關聯model->id');
            $table->string('otp_auth_own_model_type')->comment('多態關聯model->model');
            $table->unsignedInteger('otp_auth_id')->comment('關聯 otp_auth ID');
            $table->unique(
                [
                    'otp_auth_id',
                    'otp_auth_own_model_id',
                    'otp_auth_own_model_type'
                ],
                'idx_model_with_otp_auth'
            );
            $table->foreign('otp_auth_id', 'fk_otp_auth_otp_auth_id')
                ->references('id')->on('otp_auth')->onDelete('cascade');
        });
        DB::statement("ALTER TABLE `otp_auth_own` comment '多態關聯otp_auth_own'");
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

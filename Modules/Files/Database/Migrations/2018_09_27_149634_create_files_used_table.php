<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\NYEnumConstants;

class CreateFilesUsedTable extends Migration
{
    private $table = 'files_used';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_used_model_id', false, true)->comment('多態關聯model->id');
            $table->string('file_used_model_type')->comment('多態關聯model->model');
            $table->unsignedInteger('files_id')->comment('關聯 files ID');
            $table->enum('cover', NYEnumConstants::enum())->default(NYEnumConstants::NO)->comment('是否為主題');
            $table->unique(
                [
                    'file_used_model_id',
                    'file_used_model_type',
                    'files_id'
                ],
                'idx_model_with_file'
            );
            $table->index('files_id', 'idx_files_id');
            $table->foreign('files_id', 'fk_files_files_id')->references('id')->on('files')->onDelete('cascade');
        });
        DB::statement("ALTER TABLE `files_used` comment '多態關聯files'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files_used');
    }
}

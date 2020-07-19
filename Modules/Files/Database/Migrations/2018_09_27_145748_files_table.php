<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Files\Constants\FilesStatusConstants;

class FilesTable extends Migration
{
    /** @var string $table */
    private $table = 'files';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->enum('files_status', FilesStatusConstants::enum())
                ->default(FilesStatusConstants::OFF)->comment('狀態');
            $table->json('files_url')->comment('檔案上傳連結');
            $table->string('files_name')->comment('編碼後檔名');
            $table->string('files_mime')->comment('檔案類型');
            $table->string('files_path')->comment('檔案路徑');
            $table->json('files_storage_path')->comment('儲存路徑');
            $table->string('files_source_name')->comment('原始檔名');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `files` comment '檔案'");
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

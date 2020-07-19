<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Base\Constants\NYEnumConstants;

class CreateNodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('enable', NYEnumConstants::enum())->default(NYEnumConstants::YES)->comment('是否啟用');
            $table->enum('display', NYEnumConstants::enum())->default(NYEnumConstants::YES)->comment('是否顯示');
            $table->string('display_name', 50)->comment('預設顯示名稱');
            $table->string('code', 20)->comment('代號');
            $table->string('route_uri')->comment('e.g. first/second/third/fourth');
            $table->unsignedInteger('parent_id')->nullable()->comment('父節點');
            $table->timestamps();
            // index
            $table->unique('code', 'node_code_unique');
            $table->unique('route_uri', 'node_route_uri_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('node');
        \DB::connection($this->getConnection())->statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

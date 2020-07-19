<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAppManagementTableStep4 extends Migration
{
    /**
     * UpdateAppManagementTableStep4 constructor.
     * @throws \Doctrine\DBAL\DBALException
     */
    public function __construct()
    {
        Schema::getConnection()
            ->getDoctrineSchemaManager()
            ->getDatabasePlatform()
            ->registerDoctrineTypeMapping('enum', 'string');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_management', function (Blueprint $table) {
            $table->string('customer_service', 255)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_management', function (Blueprint $table) {
            $table->string('customer_service', 30)->nullable()->change();
        });
    }
}

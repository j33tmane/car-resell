<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('features',255)->nullable();
           
            $table->integer('bodystyle')->nullable();
           
            $table->string('power',5)->nullable();
            $table->string('engine',5)->nullable();
            
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('features');
            $table->dropColumn('bodystyle');
            $table->dropColumn('power');
            $table->dropColumn('engine');
            
        });
    }
}

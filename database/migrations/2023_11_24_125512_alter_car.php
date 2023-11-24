<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('cars', function (Blueprint $table) {
            $table->string('yt_link',255)->nullable();
            $table->boolean('p_steering')->nullable();
            $table->boolean('p_window')->nullable();
            $table->boolean('insurance')->nullable();
            $table->string('tyre_type',10)->nullable();
            $table->string('location',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('yt_link');
            $table->dropColumn('p_steering');
            $table->dropColumn('p_window');
            $table->dropColumn('insurance');
            $table->dropColumn('location');
            $table->dropColumn('tyre_type');
        });
    }
}

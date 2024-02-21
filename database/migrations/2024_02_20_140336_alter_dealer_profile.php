<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDealerProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('dealer_profiles', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->string('profile_img',155)->nullable();
            $table->integer('sold_cars')->nullable();
            $table->integer('total_cars')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealer_profiles', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('profile_img');
            $table->dropColumn('sold_cars');
            $table->dropColumn('total_cars');
        });
    }
}

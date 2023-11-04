<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('car_name');
            $table->integer('car_brand')->nullable();
            $table->string('year');
            $table->integer('fuel');
            $table->boolean('transmission')->nullable();
            $table->string('km_driven');
            $table->integer('no_of_owners')->nullable();
            $table->text('car_description')->nullable();
            $table->string('car_number',30)->nullable();
            $table->string('price');
            $table->boolean('active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

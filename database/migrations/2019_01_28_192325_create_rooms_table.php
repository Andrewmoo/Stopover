<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('singleBeds');
            $table->integer('doubleBeds');
            $table->boolean('bathroom');
            $table->boolean('wifi');
            $table->boolean('parking');
            $table->boolean('breakfast');
            $table->double('price');
            $table->unsignedInteger('hotel_id');
            $table->boolean('booked');
            $table->timestamps();

            // Foreign Key Contraints
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('guest_id');
            $table->unsignedInteger('room_id');
            $table->date('from');
            $table->date('to');
            $table->timestamps();

            // Foreign Key Contraints
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}

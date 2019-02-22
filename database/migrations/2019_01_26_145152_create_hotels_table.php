<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->enum('county', [
                'Antrim','Armagh','Carlow','Cavan','Clare','Cork',
                'Derry','Donegal','Down','Dublin','Fermanagh','Galway',
                'Kerry','Kildare','Kilkenny','Laois','Leitrim','Limerick',
                'Longford','Louth','Mayo','Meath','Monaghan','Offaly',
                'Roscommon','Sligo','Tipperary','Tyrone','Waterford',
                'Westmeath','Wexford','Wicklow'
            ]);
            $table->string('eircode', 7)->nullable();
            $table->unsignedInteger('user_id');
            $table->string('images')->nullable();
            $table->timestamps();

            // Foreign Key Contraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}

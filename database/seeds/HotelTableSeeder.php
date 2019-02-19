<?php

use Illuminate\Database\Seeder;
use App\Hotel;
use App\User;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotel = new Hotel;
        $hotel->name = 'Hotel One';
        $hotel->address = '51 Auckland Road, Caherciveen, Co. Kerry';
        $hotel->country = 'Ireland';
        $hotel->phone = '01232456';
        $hotel->email = 'hotel@one.com';
        $hotel->user_id = '3';
        $hotel->county = 'Dublin';
        $hotel->save();
    }
}

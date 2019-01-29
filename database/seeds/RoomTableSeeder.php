<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new Room;
        $room->singleBeds = '1';
        $room->doubleBeds = '0';
        $room->wifi = '1';
        $room->parking = '0';
        $room->breakfast = '1';
        $room->bathroom = '1';
        $room->price = '100';
        $room->hotel_id = '1';
        $room->booked = '0';
        $room->save();
    }
}

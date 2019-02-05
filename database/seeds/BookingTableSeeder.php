<?php

use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $booking = new Booking();
        $booking->guest_id = 1;
        $booking->room_id = 3;
        $booking->from = date('Y-m-d', strtotime('04/05/2019'));
        $booking->to = date('Y-m-d', strtotime('11/05/2019'));
        $booking->save();
    }
}

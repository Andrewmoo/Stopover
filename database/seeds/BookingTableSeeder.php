<?php

use Illuminate\Database\Seeder;
use App\Booking;

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

        $booking = new Booking();
        $booking->guest_id = 1;
        $booking->room_id = 4;
        $booking->from = date('Y-m-d', strtotime('13/02/2019'));
        $booking->to = date('Y-m-d', strtotime('20/02/2019'));
        $booking->save();

        $booking = new Booking();
        $booking->guest_id = 1;
        $booking->room_id = 2;
        $booking->from = date('Y-m-d', strtotime('18/02/2019'));
        $booking->to = date('Y-m-d', strtotime('22/02/2019'));
        $booking->save();

        $booking = new Booking();
        $booking->guest_id = 1;
        $booking->room_id = 3;
        $booking->from = date('Y-m-d', strtotime('06/02/2019'));
        $booking->to = date('Y-m-d', strtotime('13/02/2019'));
        $booking->save();

        $booking = new Booking();
        $booking->guest_id = 1;
        $booking->room_id = 1;
        $booking->from = date('Y-m-d', strtotime('08/02/2019'));
        $booking->to = date('Y-m-d', strtotime('24/02/2019'));
        $booking->save();

        $booking = new Booking();
        $booking->guest_id = 1;
        $booking->room_id = 3;
        $booking->from = date('Y-m-d', strtotime('14/02/2019'));
        $booking->to = date('Y-m-d', strtotime('15/02/2019'));
        $booking->save();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Guest;
use App\Hotel;
use App\Booking;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        if(auth()->user()->hasRole('hotel')){
          $hotel_id = Hotel::where('user_id', $user_id)->first()->id;

          $sql =
          "SELECT r.singleBeds, r.doubleBeds, r.bathroom, r.wifi, r.parking, r.breakfast, r.price, r.hotel_id, r.room_image, b.*, h.name
          FROM bookings b
          LEFT JOIN rooms r ON b.room_id = r.id
          LEFT JOIN hotels h ON r.hotel_id = h.id
          WHERE hotel_id = 1";

          $bookings = DB::select($sql, [
              'hotel_id' => $hotel_id,
          ]);

          return view('dashboard')->with([
              'bookings' => $bookings,
          ]);
        }
        else{
          $guest_id = Guest::where('user_id', $user_id)->first()->id;

          $sql =
          "SELECT r.singleBeds, r.doubleBeds, r.bathroom, r.wifi, r.parking, r.breakfast, r.price, r.hotel_id, r.room_image, b.*, h.name
          FROM rooms r
          LEFT JOIN bookings b ON r.id = b.room_id
          LEFT JOIN hotels h ON r.hotel_id = h.id
          WHERE guest_id = :guest_id";

          $bookings = DB::select($sql, [
              'guest_id' => $guest_id,
          ]);

          return view('dashboard')->with([
              'bookings' => $bookings,
          ]);
        }


        //$bookings = Booking::where('guest_id', $guest_id)->get();


    }
}

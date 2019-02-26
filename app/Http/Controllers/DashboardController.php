<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

use App\User;
use App\Room;
use App\Guest;
use App\Hotel;
use App\Booking;

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
        $user_id = Auth::user()->id;
        if(!Auth::guest() && Auth::user()->hasRole('hotel')){
          $hotel = Hotel::where('user_id', $user_id)->first();

          $sql =
          "SELECT r.singleBeds, r.doubleBeds, r.bathroom, r.wifi, r.parking, r.breakfast, r.price, r.hotel_id, b.*, h.name
          FROM bookings b
          LEFT JOIN rooms r ON b.room_id = r.id
          LEFT JOIN hotels h ON r.hotel_id = h.id
          WHERE hotel_id = :hotel_id";

          $bookings = DB::select($sql, [
              'hotel_id' => $hotel->id,
          ]);

          return view('dashboard')->with([
              'bookings' => $bookings,
              'hotel' => $hotel
          ]);
        }
        else if(!Auth::guest() && Auth::user()->hasRole('guest')){
          $guest = Guest::where('user_id', $user_id)->first();

          $sql =
          "SELECT r.singleBeds, r.doubleBeds, r.bathroom, r.wifi, r.parking, r.breakfast, r.price, r.hotel_id, b.*, h.name
          FROM rooms r
          LEFT JOIN bookings b ON r.id = b.room_id
          LEFT JOIN hotels h ON r.hotel_id = h.id
          WHERE guest_id = :guest_id";

          $bookings = DB::select($sql, [
              'guest_id' => $guest->id,
          ]);

          return view('dashboard')->with([
              'bookings' => $bookings,
              'guest' => $guest
          ]);
        }
        else {
            return redirect()->back();
        }
    }
}

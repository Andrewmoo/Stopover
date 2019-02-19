<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Guest;
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
        $user_id = auth()->user()->id;
        $guest_id = Guest::find($user_id)->id;
        $rooms = Booking::where('user_id', $guest_id)->get();
        return view('dashboard')->with([
            'rooms' => $rooms,
        ]);
    }
}

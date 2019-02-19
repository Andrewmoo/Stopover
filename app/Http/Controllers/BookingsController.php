<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Room;
use App\Guest;
use Auth;

class BookingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getRoom($id) {
        $room_id = $id;
        return redirect()->action('BookingsController@create', ['room_id' => $room_id]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $guest_id = Guest::where('user_id', auth()->user()->id)->first()->id;
        $room_id = $id;
        
        return view('bookings.create')->with([
            'guest_id' => $guest_id,
            'room_id' => $room_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'guest_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'from' => 'required|date',
            'to' => 'required|date'
        ]);
  
        //create booking
        $booking = new Booking;
        $booking->guest_id = $request->input('guest_id');
        $booking->room_id = $request->input('room_id');
        $booking->from = $request->input('from');
        $booking->to = $request->input('to');
        $booking->save();

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $guest_id)
    {

        if(Auth::user()->id != Guest::where('id', $guest_id)->first()->user_id) {
            return redirect('dashboard')->with('error', 'Illegal booking request.');
        }

        $booking = Booking::find($id);
        return view('bookings.edit')->with('booking', $booking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'guest_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'from' => 'required|date',
            'to' => 'required|date'
        ]);
  
        //create booking
        $booking = Booking::find($id);
        $booking->guest_id = $request->input('guest_id');
        $booking->room_id = $request->input('room_id');
        $booking->from = $request->input('from');
        $booking->to = $request->input('to');
        $booking->save();

        return redirect('/dashboard')->with('success', 'Booking Updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::where('id', $id);
        //Check for correct user_id
        // if(auth()->user()->id !==$post->user_id){
        //     return redirect('/posts')->with('error', 'Unauthorised Page');
        // }
        
        $booking->delete();
        return redirect('/dashboard')->with('success', 'Booking Removed');
    }
}

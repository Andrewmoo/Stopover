<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Booking;
use App\Room;
use App\Student;

class BookingsController extends Controller
{
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
        if(auth()->user()->type != 'guest' || auth()->user()->completeReg == '0')
        {
            return redirect('/students/create');
        }

        $student_id = Student::where('user_id', auth()->user()->id)->first()->id;
        $room_id = $id;
        
        return view('bookings.create')->with([
            'student_id' => $student_id,
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
            'student_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'from' => 'required|date',
            'to' => 'required|date'
        ]);
  
        //create booking
        $booking = new Booking;
        $booking->student_id = $request->input('student_id');
        $booking->room_id = $request->input('room_id');
        $booking->from = $request->input('from');
        $booking->to = $request->input('to');
        $booking->save();

        Room::where('id', $booking->room_id)->update(array('booked' => '1'));

        return redirect('/');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

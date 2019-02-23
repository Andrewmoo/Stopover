<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Hotel;
use App\Room;
use Auth;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::orderBy('created_at','desc')->paginate(10);
        return view('hotels.index')->with('hotels', $hotels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('hotel'))
        {
            return redirect('/');
        }

        $user_id = Auth::user()->id;
        return view('hotels.create')->with('user_id', $user_id);
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
            'name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'county' => 'required|string|max:50',
            'eircode' => 'string|min:7|max:7',
            'phone' => 'required|string|max:50',
            'email' => 'required|string|email|max:191',
            'user_id' => 'required|numeric|exists:users,id'
        ]);
  
        //create hotel
        $hotel = new Hotel;
        $hotel->name = $request->input('name');
        $hotel->address = $request->input('address');
        $hotel->county = $request->input('county');
        $hotel->eircode = $request->input('eircode');
        $hotel->phone = $request->input('phone');
        $hotel->email = $request->input('email');
        $hotel->user_id = $request->input('user_id');
        $hotel->save();

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
        $uhotel_id = Hotel::where('user_id', Auth::user()->id)->first()->id;
        if($id != $uhotel_id)
        {
            return redirect('/');
        }
        $hotel = Hotel::find($id);
        $rooms = Room::where('hotel_id', $id)->orderBy('created_at','desc')->paginate(10);
        return view('hotels.show')->with([
            'hotel' => $hotel,
            'rooms' => $rooms
        ]);
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

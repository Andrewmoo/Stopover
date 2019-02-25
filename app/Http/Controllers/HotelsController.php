<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\User;
use App\Hotel;
use App\Guest;
use App\Room;
use App\HotelReview;

class HotelsController extends Controller
{
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
        if(!Auth::guest() && Auth::user()->hasRole('hotel')) {
            $uhotel_id = Hotel::where('user_id', Auth::user()->id)->first()->id;
        }
        else if(!Auth::guest() && Auth::user()->hasRole('guest')) {
            $guest = Guest::where('user_id', Auth::user()->id)->first();
        }

        $hotel = Hotel::find($id);
        $guests = Guest::all();
        $reviews = HotelReview::where('hotel_id', $hotel->id)->orderby('created_at','desc')->limit(5)->get();
        $rooms = Room::where('hotel_id', $id)->orderBy('created_at','desc')->paginate(10);

        if(!Auth::guest() && Auth::user()->hasRole('guest')) {
            return view('hotels.show')->with([
                'hotel' => $hotel,
                'rooms' => $rooms,
                'reviews' => $reviews,
                'guests' => $guests,
                'guest' => $guest
            ]);
        }
        else {
            return view('hotels.show')->with([
                'hotel' => $hotel,
                'rooms' => $rooms,
                'reviews' => $reviews,
                'guests' => $guests
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::find($id);
        if(Auth::guest() || !Auth::user()->hasRole('hotel') || $hotel->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Invalid request.');
        }
        return view('hotels.edit')->with('hotel', $hotel);
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
            'name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'county' => 'required|string|max:50',
            'eircode' => 'string|min:7|max:7|nullable',
            'phone' => 'required|string|max:50',
            'email' => 'required|string|email|max:191',
        ]);
  
        //create hotel
        $hotel = Hotel::find($id);
        $hotel->name = $request->input('name');
        $hotel->address = $request->input('address');
        $hotel->county = $request->input('county');
        $hotel->eircode = $request->input('eircode');
        $hotel->phone = $request->input('phone');
        $hotel->email = $request->input('email');
        $hotel->save();

        return redirect()->back()->with('success', 'Details updated successfully.');
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

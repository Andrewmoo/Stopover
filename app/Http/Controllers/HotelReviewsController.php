<?php

namespace App\Http\Controllers;

use App\HotelReview;
use Illuminate\Http\Request;
use App\Guest;
use App\Hotel;

class HotelReviewsController extends Controller
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id){
      $hotel = Hotel::find($id);

      $guest_id = auth()->user()->id;
      $hotel_id = $hotel;
      return view('hotels.review')->with('guest_id', $guest_id, 'hotel_id', $hotel_id);
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
          'headline' => 'required|string|max:191',
          'body' => 'required|string|max:2000',
          'rating' => 'required|string|max:50',
          'guest_id' => 'required|numeric',
          'hotel_id' => 'required|numeric',
      ]);

      //create post
      $hotel_review = new HotelReview;
      $hotel_review->headline = $request->input('headline');
      $hotel_review->body = $request->input('body');
      $hotel_review->rating = $request->input('rating');
      $hotel_review->guest_id = $request->input('guest_id');
      $hotel_review->hotel_id = $request->input('hotel_id');
      $hotel_review->save();

      return redirect('/hotels')->with('success', 'Review Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelReview  $hotelReview
     * @return \Illuminate\Http\Response
     */
    public function show(HotelReview $hotelReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelReview  $hotelReview
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelReview $hotelReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelReview  $hotelReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HotelReview $hotelReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelReview  $hotelReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(HotelReview $hotelReview)
    {
        //
    }
}

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

      $hotel_id= $id;
      $guest_id = auth()->user()->id;
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
          'headline' => 'string|max:50|nullable',
          'body' => 'required|string|max:2000',
          'rating' => 'required|numeric|min:1|max:5',
          'guest_id' => 'required|numeric',
          'hotel_id' => 'required|numeric',
      ]);

      // create review
      $review = new HotelReview;
      $review->headline = $request->input('headline');
      $review->body = $request->input('body');
      $review->rating = $request->input('rating');
      $review->guest_id = $request->input('guest_id');
      $review->hotel_id = $request->input('hotel_id');
      $review->save();

      return redirect('/hotels/'.$review->hotel_id)->with('success', 'Your review has been posted.');
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
    public function update(Request $request)
    {
        $this->validate($request,[
            'headline' => 'string|max:50|nullable',
            'body' => 'required|string|max:2000',
            'rating' => 'required|numeric|min:1|max:5',
            'guest_id' => 'required|numeric',
            'hotel_id' => 'required|numeric',
        ]);
  
        // create review
        $review = HotelReview::where([
            'guest_id' => $request->input('guest_id'),
            'hotel_id' => $request->input('hotel_id'),
        ])->first();
        $review->headline = $request->input('headline');
        $review->body = $request->input('body');
        $review->rating = $request->input('rating');
        $review->guest_id = $request->input('guest_id');
        $review->hotel_id = $request->input('hotel_id');
        $review->save();
  
        return redirect('/hotels/'.$review->hotel_id)->with('success', 'Your review has been modified.');
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

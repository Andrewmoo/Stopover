<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

use App\Room;
use App\Hotel;
use App\Guest;
use App\HotelImage;

class RoomsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth', ['except' => ['show', 'search']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->hasRole('hotel'))
        {
          return redirect()->back()->with('error', 'Invalid request.');
        }
        $hotel = Hotel::where('user_id', Auth::user()->id)->first();
        $rooms = Room::where('hotel_id', $hotel->id)->orderBy('created_at','desc')->paginate(10);
        return view('rooms.index')->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->hasRole('hotel'))
        {
            return redirect()->back()->with('error', 'Invalid Request');
        }
        $hotel = Hotel::where('user_id', auth()->user()->id)->first();
        return view('rooms.create')->with('hotel', $hotel);
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
          'singleBeds' => 'numeric',
          'doubleBeds' => 'numeric',
          'bathroom' => 'required|numeric|min:0|max:1',
          'wifi' => 'required|numeric|min:0|max:1',
          'parking' => 'required|numeric|min:0|max:1',
          'breakfast' => 'required|numeric|min:0|max:1',
          'price' => 'required|numeric',
          'hotel_id' => 'required|numeric|exists:hotels,id',
        ]);

        // create room
        $room = new Room;
        $room->singleBeds = $request->input('singleBeds');
        $room->doubleBeds = $request->input('doubleBeds');
        $room->bathroom = $request->input('bathroom');
        $room->wifi = $request->input('wifi');
        $room->parking = $request->input('parking');
        $room->breakfast = $request->input('breakfast');
        $room->price = $request->input('price');
        $room->hotel_id = $request->input('hotel_id');
        $room->save();

        return redirect('/rooms')->with('success', 'Room listing added successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $from = null, $to = null)
    {
        $guest_id = 0;
        if(!Auth::guest() && Auth::user()->hasRole('guest'))
        {
          $guest_id = Guest::where('user_id', Auth::user()->id)->first()->id;
        }
        $room = Room::find($id);
        $hotel = Hotel::where('id', $room->hotel_id)->first();
        $hotelimages = HotelImage::where('hotel_id', $hotel->id)->get();

        return view('rooms.show')->with([
          'room' => $room,
          'guest_id' => $guest_id,
          'from' => $from,
          'to' => $to,
          'hotel' => $hotel,
          'hotelimages' => $hotelimages
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
      $room = Room::find($id);
      $hotel = Hotel::find($room->hotel_id);
      if(!Auth::user()->hasRole('hotel') || $hotel->user_id != Auth::user()->id) {
        return redirect()->back()->with('error', 'Invalid request.');
      }
      return view('rooms.edit')->with([
        'room' => $room,
        'hotel' => $hotel
      ]);
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
      $hotel = Hotel::find($request->input('hotel_id'));
        if(Auth::guest() || !Auth::user()->hasRole('hotel') || $hotel->user_id != Auth::user()->id) {
            return redirect()->back()->with('error', 'Invalid request.');
      }
      $this->validate($request,[
        'singleBeds' => 'numeric',
        'doubleBeds' => 'numeric',
        'bathroom' => 'required|numeric|min:0|max:1',
        'wifi' => 'required|numeric|min:0|max:1',
        'parking' => 'required|numeric|min:0|max:1',
        'breakfast' => 'required|numeric|min:0|max:1',
        'price' => 'required|numeric',
      ]);

      // create room
      $room = Room::find($id);
      $room->singleBeds = $request->input('singleBeds');
      $room->doubleBeds = $request->input('doubleBeds');
      $room->bathroom = $request->input('bathroom');
      $room->wifi = $request->input('wifi');
      $room->parking = $request->input('parking');
      $room->breakfast = $request->input('breakfast');
      $room->price = $request->input('price');
      $room->save();

      return redirect('/rooms')->with('success', 'Room listing modified successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        $room->delete();
        return redirect('/rooms')->with('success', 'Room Removed');
    }

    public function search(Request $request)
    {
        $hotelimages = HotelImage::all();
        $to = $request->input('to');
        $from = $request->input('from');
        $county = $request->input('county');
        $people = $request->input('people');
        $counties = array(
          "Antrim", "Armagh", "Carlow", "Cavan", "Clare", "Cork", "Derry",
          "Donegal", "Down", "Dublin", "Fermanagh", "Galway", "Kerry", "Kildare",
          "Kilkenny", "Laois", "Leitrim", "Limerick", "Longford", "Louth", "Mayo",
          "Meath", "Monaghan", "Offaly", "Roscommon", "Sligo", "Tipperary", "Tyrone",
          "Waterford", "Westmeath", "Wexford", "Wicklow"
        );

        try{
          $sql =
          'SELECT DISTINCT r.*, h.id as hotel_id, h.name as hotel_name, h.address, h.county
          FROM rooms r
          LEFT JOIN bookings b ON r.id = b.room_id
          LEFT JOIN hotels h ON h.id = r.hotel_id
          WHERE h.county = :county 
          AND (r.singleBeds + r.doubleBeds*2) = :people 
          AND r.id NOT IN(
            SELECT b.room_id
            FROM bookings as b
            WHERE(
              (b.from <= :to1 AND b.to >= :to2)
              OR (b.from <= :from1 AND b.to > :from2)
              OR (b.from >= :from3 AND b.to <= :to3)
              OR (b.from <= :from4 AND b.to >= :to4)
            )
          )';

          $rooms = DB::select($sql, [
            'from1' => $from,
            'from2' => $from,
            'from3' => $from,
            'from4' => $from,
            'to1' => $to,
            'to2' => $to,
            'to3' => $to,
            'to4' => $to,
            'county' => $county,
            'people' => $people
          ]);
        }
        catch(Illuminate\Database\QueryException $ex){
          return 'WHOOP';
        }

        return view('rooms.results')->with([
          'rooms' => $rooms,
          'from' => $from,
          'to' => $to,
          'county' => $county,
          'people' => $people,
          'hotelimages' => $hotelimages,
          'counties' => $counties
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Hotel;
use DB;
use App\Guest;

class RoomsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::orderBy('created_at','desc')->paginate(10);
        return view('rooms.index')->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->guest() && !auth()->user()->hasRole('hotel'))
        {
            return redirect('/dashboard')->with('error', 'Invalid Request');
        }
        $hotel_id = Hotel::where('user_id', auth()->user()->id)->first()->id;
        return view('rooms.create')->with('hotel_id', $hotel_id);
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



        //create room
        $room = new Room;
        $room->singleBeds = $request->input('singleBeds');
        $room->doubleBeds = $request->input('doubleBeds');
        $room->bathroom = $request->input('bathroom');
        $room->wifi = $request->input('wifi');
        $room->parking = $request->input('parking');
        $room->breakfast = $request->input('breakfast');
        $room->price = $request->input('price');
        $room->hotel_id = $request->input('hotel_id');
        $room->booked = '0';
        $room->save();

        return redirect('/rooms')->with('success', 'Room Listed');
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
        if(!auth()->guest() && auth()->user()->hasRole('guest'))
        {
          $guest_id = Guest::where('user_id', auth()->user()->id)->first()->id;
        }
        $room = Room::find($id);

        return view('rooms.show')->with([
          'room' => $room,
          'guest_id' => $guest_id,
          'from' => $from,
          'to' => $to
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

      //   Check for correct user_id
      //   if(auth()->user()->id !==$post->user_id){
      //       return redirect('/posts')->with('error', 'Unauthorised Page');
      //   }
      return view('rooms.edit')->with('room', $room);
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
        'description' => 'required',
        'facilities' => 'required',
        'noBeds' => 'required'
      ]);

      //create Room
      $room = Room::find($id);
      $room->description = $request->input('description');
      $room->facilities = $request->input('facilities');
      $room->save();

      return redirect('/rooms')->with('success', 'Room Updated');
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
        //Check for correct user_id
        // if(auth()->user()->id !==$post->user_id){
        //     return redirect('/posts')->with('error', 'Unauthorised Page');
        // }

        $room->delete();
        return redirect('/rooms')->with('success', 'Room Removed');
    }

    public function search(Request $request)
    {
        $to = $request->input('to');
        $from = $request->input('from');

        try{
          // $rooms = DB::statement('
          //     SELECT *
          //     FROM rooms as r
          //     WHERE r.id NOT IN(
          //         SELECT b.room_id
          //         FROM bookings as b
          //         WHERE b.from <= '.$from.'
          //           AND b.to >= '.$to.');
          //
          // $sql =
          //   'SELECT DISTINCT r.*, h.name as hotel_name
          //   FROM bookings b
          //   LEFT JOIN rooms r ON r.id = b.room_id
          //   LEFT JOIN hotels h ON h.id = r.hotel_id
          //   WHERE NOT((b.from < :to1 AND b.to > :to2)
          //   OR (b.from < :from1 AND b.to > :from2)
          //   OR (b.from > :from3 AND b.to < :to3)
          //   OR (b.from < :from4 AND b.to > :to4))';

          $sql =
          'SELECT DISTINCT r.*, h.name as hotel_name
          FROM rooms r
          LEFT JOIN bookings b ON r.id = b.room_id
          LEFT JOIN hotels h ON h.id = r.hotel_id
          WHERE r.id NOT IN(
            SELECT b.room_id
            FROM bookings as b
            WHERE((b.from < :to1 AND b.to > :to2)
            OR (b.from < :from1 AND b.to > :from2)
            OR (b.from > :from3 AND b.to < :to3)
            OR (b.from < :from4 AND b.to > :to4))
          )';

          $rooms = DB::select($sql, [
            'from1' => $from,
            'from2' => $from,
            'from3' => $from,
            'from4' => $from,
            'to1' => $to,
            'to2' => $to,
            'to3' => $to,
            'to4' => $to
          ]);
          //dd($rooms);
        }
        catch(Illuminate\Database\QueryException $ex){
          return 'WHOOP';
        }

        return view('rooms.results')->with([
          'rooms' => $rooms,
          'from' => $from,
          'to' => $to
        ]);
    }
}

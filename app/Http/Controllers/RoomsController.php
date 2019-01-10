<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth', ['except' => ['index', 'show']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
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
        return view('rooms.create');
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
          'description' => 'required',
          'facilities' => 'required',
          'noBeds' => 'required'
        ]);

        //create room
        $room = new Room;
        $room->description = $request->input('description');
        $room->facilities = $request->input('facilities');
        $room->save();

        return redirect('/rooms')->with('success', 'Room Listed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($room_id)
    {
        $room = Room::find($room_id);
        return view('rooms.show')->with('room', $room);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($room_id)
    {
      $room = Room::find($room_id);

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
    public function update(Request $request, $room_id)
    {
      $this->validate($request,[
        'description' => 'required',
        'facilities' => 'required',
        'noBeds' => 'required'
      ]);

      //create Room
      $room = Room::find($room_id);
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
    public function destroy($room_id)
    {
        $room = Room::find($room_id);
        //Check for correct user_id
        // if(auth()->user()->id !==$post->user_id){
        //     return redirect('/posts')->with('error', 'Unauthorised Page');
        // }

        $room->delete();
        return redirect('/rooms')->with('success', 'Room Removed');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Hotel;
use App\Image;

class ImagesController extends Controller
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
    public function create()
    {
      if(!auth()->user()->hasRole('hotel'))
      {
          return redirect('/');
      }
      $hotel_id = Hotel::where('user_id', auth()->user()->id)->first()->id;
      return view('images.create')->with('hotel_id', $hotel_id);

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
        'hotel_id' => 'required|numeric|exists:hotels,id',
        'filenames' => 'image|nullable|max:1999'
      ]);


      //Handle file upload

        //Handle file upload
        if($request->hasFile('hotel_image')){
          //get file name with extension
          $fileNameWithExt = $request->file('hotel_image')->getClientOriginalName();
          //get just file name
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          //get just extension
          $extension = $request->file('hotel_image')->getClientOriginalExtension();
          //filename to store
            //doing .'_'.time() makes all file names unique even if two uploads have the same name
          $fileNameToStore = $fileName.'_'.time().'.'.$extension;
          //upload image
          $path = $request->file('hotel_image')->storeAs('public/hotel_images', $fileNameToStore);
        }else{
          $fileNameToStore = 'noimage.jpg';
       }


      //create room
      $image = new Image;
      $image->hotel_id = $request->input('hotel_id');
      $image->filenames = $fileNameToStore;
      $room->save();

      return redirect('/hotels/'.$request->input('hotel_id'))->with('success', 'Images Uploaded');
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

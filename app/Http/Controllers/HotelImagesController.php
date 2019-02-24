<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\HotelImage;
use File;
use Image;
use Auth;
use Route;
use App\Http\Requests\UploadRequest;

class HotelImagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HotelImage $photo)
    {
        $this->middleware('auth');
        $this->photo = $photo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Route::current()->parameter('id');
        $hotel = Hotel::find($id);
        $photos = HotelImage::where('hotel_id', $hotel->id)->get();

        if(!Auth::user()->hasRole('hotel') || $hotel->user_id != Auth::user()->id)
        {
            return redirect('/');
        }

        return view('hotelimages.index')->with([
            'hotel' => $hotel,
            'photos' => $photos
        ]);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
 
        // check if image exist
        if ($request->hasFile('image')) {
            $images = $request->file('image');
 
            // setting flag for condition
            $org_img = $thm_img = true;
 
            // create new directory for uploading image if doesn't exist
            if( ! File::exists('images/originals/')) {
                $org_img = File::makeDirectory('images/originals/', 0777, true);
            }
            if ( ! File::exists('images/thumbnails/')) {
                $thm_img = File::makeDirectory('images/thumbnails', 0777, true);
            }
 
            // loop through each image to save and upload
            foreach($images as $key => $image) {
                // create new instance of HotelImage class
                $newPhoto = new $this->photo;
                // get file name of image and concatenate with 4 random integer for unique
                $filename = rand(1111,9999).time().'.'.$image->getClientOriginalExtension();
                // path of image for upload
                $org_path = 'images/originals/' . $filename;
                $thm_path = 'images/thumbnails/' . $filename;
                $newPhoto->hotel_id  = $request->input('hotel_id');
                $newPhoto->image     = 'images/originals/'.$filename;
                $newPhoto->thumbnail = 'images/thumbnails/'.$filename;
 
                // don't upload file when unable to save name to database
                if ( ! $newPhoto->save()) {
                    return false;
                }
 
                // upload image to server
                if (($org_img && $thm_img) == true) {
                   Image::make($image)->fit(900, 500, function ($constraint) {
                           $constraint->upsize();
                       })->save($org_path);
                   Image::make($image)->fit(270, 160, function ($constraint) {
                       $constraint->upsize();
                   })->save($thm_path);
                }
            }
        }
        return redirect('/hotels/'.$newPhoto->hotel_id.'/gallery');
    }

    public function destroy($id)
    {
        $image = HotelImage::findOrFail($id);
        $image_path = public_path().'/'.$image->image;
        $thumb_path = public_path().'/'.$image->thumbnail;
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if (File::exists($thumb_path)) {
            File::delete($thumb_path);
        }
        $image->delete();
        return redirect('/hotels/'.$image->hotel_id.'/gallery')->with('success','Image deleted.');
    }
}

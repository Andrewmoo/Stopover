<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Hotel;

class Hotel extends Model
{
    //Table name
    protected $table = 'hotels';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function rooms() {
        return $this->hasMany('App\Room');
    }

    public static function getHotelId($user_id) {
        $hotel = Hotel::where('user_id', $user_id)->first();
        return $hotel->id;
    }
}

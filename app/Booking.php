<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //Table name
    protected $table = 'bookings';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function users() {
        return $this->belongsTo('App\User');
    }

    public function rooms() {
        return $this->belongsTo('App\Room');
    }
}

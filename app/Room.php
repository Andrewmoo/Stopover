<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //Table name
    protected $table = 'rooms';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function hotel() {
      return $this->belongsTo('App\Hotel');
    }

    public function booking() {
      return $this->hasOne('App\Booking');
    }
}

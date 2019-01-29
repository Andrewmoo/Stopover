<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //Table name
    protected $table = 'students';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function bookings() {
        return $this->hasMany('App\Booking');
    }
}

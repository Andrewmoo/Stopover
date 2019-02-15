<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'firstName', 'lastName', 'phone', 'email', 'address', 'institution', 'user_id'
    ];
    //Table name
    protected $table = 'guests';
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

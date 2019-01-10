<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //Table name
    protected $table = 'room';
    //Primary key
    public $primaryKey = 'room_id';
    //Timestamps
    public $timestamps = true;

    public function user(){
      return $this->belongsTo('App\User');
    }
}

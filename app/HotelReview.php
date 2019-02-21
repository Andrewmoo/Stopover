<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelReview extends Model
{
    protected $fillable=[
      'headline',
      'body',
      'rating'
    ];

  public function user(){
  return $this->belongsTo('App\Guest');
}
}

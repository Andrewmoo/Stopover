<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  //Table name
  protected $table = 'images';
  //Primary key
  public $primaryKey = 'id';
  //Timestamps
  public $timestamps = true;

  public function hotel() {
    return $this->belongsTo('App\Hotel');
  }
}

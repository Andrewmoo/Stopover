<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    protected $fillable = ['hotel_id', 'image', 'thumbnail'];
    //Table name
    protected $table = 'hotel_images';
    //Primary key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function hotel() {
        return $this->belongsTo('App\Hotel');
    }
}

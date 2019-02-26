<?php

use Illuminate\Database\Seeder;
use App\HotelImage;

class HotelImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = new HotelImage;
        $image->image = 'images/originals/26071551094487.jpg';
        $image->thumbnail = 'images/thumbnails/26071551094487.jpg';
        $image->hotel_id = 1;
        $image->save();

        $image = new HotelImage;
        $image->image = 'images/originals/90271551094488.jpg';
        $image->thumbnail = 'images/thumbnails/90271551094488.jpg';
        $image->hotel_id = 1;
        $image->save();
    }
}

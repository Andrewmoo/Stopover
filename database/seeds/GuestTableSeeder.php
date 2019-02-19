<?php

use Illuminate\Database\Seeder;
use App\Guest;

class GuestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guest = new Guest();
        $guest->firstName = "Guest";
        $guest->lastName = "One";
        $guest->email = "guest@one.com";
        $guest->address = "15 Limekiln Lane";
        $guest->phone = "+353 85 6767354";
        $guest->institution = "+353 85 6767354";
        $guest->user_id = "1";
        $guest->save();
    }
}

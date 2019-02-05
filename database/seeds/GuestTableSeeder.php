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
        $guest = new Guest;
        $guest->firstName = 'Kaidrew';
        $guest->lastName = 'Moonic';
        $guest->email = 'guest@guest.com';
        $guest->address = '15 Sesh Lane';
        $guest->institution = 'IADT';
        $guest->save();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_guest = Role::where('type', 'guest')->first();
      $role_admin = Role::where('type', 'admin')->first();
      $role_hotel = Role::where('type', 'hotel')->first();

      $guest = new User();
      $guest->name = 'guest Name';
      $guest->username = 'guest';
      $guest->email = 'guest@example.com';
      $guest->password = bcrypt('secret');
      $guest->type = User::GUEST_TYPE;
      $guest->save();
      $guest->roles()->attach($role_guest);

      $admin = new User();
      $admin->name = 'admin Name';
      $admin->username = 'admin';
      $admin->email = 'admin@example.com';
      $admin->password = bcrypt('secret');
      $admin->type = User::ADMIN_TYPE;
      $admin->completeReg = '1';
      $admin->save();
      $admin->roles()->attach($role_admin);

      $hotel = new User();
      $hotel->name = 'Hotel One';
      $hotel->username = 'hotelone';
      $hotel->email = 'hotel@one.com';
      $hotel->password = bcrypt('secret');
      $hotel->type = User::HOTEL_TYPE;
      $hotel->save();
      $hotel->roles()->attach($role_hotel);
    }
}

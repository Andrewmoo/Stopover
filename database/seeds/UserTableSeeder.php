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
      $guest->save();
      $guest->roles()->attach($role_guest);

      $admin = new User();
      $admin->name = 'admin Name';
      $admin->username = 'admin';
      $admin->email = 'admin@example.com';
      $admin->password = bcrypt('secret');
      $admin->save();
      $admin->roles()->attach($role_admin);

      $hotel = new User();
      $hotel->name = 'Dunsilly Hotel';
      $hotel->username = 'Antrim';
      $hotel->email = 'hotel@one.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Dobbin Lodge';
      $hotel->username = 'Armagh';
      $hotel->email = 'hotel@two.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Woodford Dolmen Hotel Carlow';
      $hotel->username = 'Carlow';
      $hotel->email = 'hotel@three.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Roadside Cottage The Burren';
      $hotel->username = 'Clare';
      $hotel->email = 'hotel@four.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Maldron Hotel Shandon Cork City';
      $hotel->username = 'Cork';
      $hotel->email = 'hotel@five.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Waterfoot Hotel';
      $hotel->username = 'Derry';
      $hotel->email = 'hotel@six.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'The Gateway Lodge';
      $hotel->username = 'Donegal';
      $hotel->email = 'hotel@seven.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Clandeboyne Lodge Hotel';
      $hotel->username = 'Down';
      $hotel->email = 'hotel@eight.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Clayton Hotel Cardiff Lane';
      $hotel->username = 'Dublin';
      $hotel->email = 'hotel@nine.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Lough Erne Resort';
      $hotel->username = 'Fermanagh';
      $hotel->email = 'hotel@ten.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'The Connacht Hotel';
      $hotel->username = 'Galway';
      $hotel->email = 'hotel@eleven.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Butler Arms Hotel';
      $hotel->username = 'Kerry';
      $hotel->email = 'hotel@twelve.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Silken Thomas';
      $hotel->username = 'Kildare';
      $hotel->email = 'hotel@thirteen.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Kilkenny Ormonde Hotel';
      $hotel->username = 'Kilkenny';
      $hotel->email = 'hotel@fourteen.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'The Heritage Killenard';
      $hotel->username = 'Laois';
      $hotel->email = 'hotel@fifteen.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Lough Allen Hotel & Spa';
      $hotel->username = 'Leitrim';
      $hotel->email = 'hotel@sixteen.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'George Limerick Hotel';
      $hotel->username = 'Limerick';
      $hotel->email = 'hotel@seventeen.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Longford Arms Hotel';
      $hotel->username = 'Longford';
      $hotel->email = 'hotel@eighteen.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Carnbeg Hotel ';
      $hotel->username = 'Louth';
      $hotel->email = 'hotel@nineteen.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'McWilliam Park Hotel';
      $hotel->username = 'Mayo';
      $hotel->email = 'hotel@twenty.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'The Johnstown Estate';
      $hotel->username = 'Meath';
      $hotel->email = 'hotel@twentyone.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Hillgove Hotel, Leisure & Spa';
      $hotel->username = 'Monaghan';
      $hotel->email = 'hotel@twentytwo.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Bridge House Hotel, Leisure Club & Spa';
      $hotel->username = 'Offaly';
      $hotel->email = 'hotel@twentythree.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = "Hannon's Hotel";
      $hotel->username = 'Roscommon';
      $hotel->email = 'hotel@twentyfour.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Riverside Hotel';
      $hotel->username = 'Sligo';
      $hotel->email = 'hotel@twentyfive.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'GN Ballykisteen Golf Hotel';
      $hotel->username = 'Tipperary';
      $hotel->email = 'hotel@twentysix.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'The Valley Hotel';
      $hotel->username = 'Tyrone';
      $hotel->email = 'hotel@twentyseven.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Waterford Marina Hotel';
      $hotel->username = 'Waterford';
      $hotel->email = 'hotel@twentyeight.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Mullingar Park Hotel';
      $hotel->username = 'Westmeath';
      $hotel->email = 'hotel@twentynine.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Clayton Whites Hotel';
      $hotel->username = 'Wexford';
      $hotel->email = 'hotel@thirty.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Dunbur Lodge';
      $hotel->username = 'Wicklow';
      $hotel->email = 'hotel@thirtyone.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);

      $hotel = new User();
      $hotel->name = 'Farnham Estate Spa and Golf Resort';
      $hotel->username = 'Cavan';
      $hotel->email = 'hotel@thirtytwo.com';
      $hotel->password = bcrypt('secret');
      $hotel->save();
      $hotel->roles()->attach($role_hotel);


    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // Role comes before User seeder here.
      $this->call(RoleTableSeeder::class);

      // User seeder will use the roles above created.
      $this->call(UserTableSeeder::class);

      $this->call(HotelTableSeeder::class);
      $this->call(GuestTableSeeder::class);
      $this->call(RoomTableSeeder::class);
      $this->call(BookingTableSeeder::class);
      $this->call(HotelImageTableSeeder::class);
      $this->call(HotelReviewSeeder::class);
    }
}

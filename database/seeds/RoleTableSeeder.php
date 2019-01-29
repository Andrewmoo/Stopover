<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user = new Role();
      $role_user->type = 'guest';
      $role_user->description = 'A guest user';
      $role_user->save();

      $role_admin = new Role();
      $role_admin->type = 'admin';
      $role_admin->description = 'An admin user';
      $role_admin->save();
      
      $role_admin = new Role();
      $role_admin->type = 'hotel';
      $role_admin->description = 'A hotel user';
      $role_admin->save();
    }
}

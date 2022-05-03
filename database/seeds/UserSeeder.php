<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run(Faker $faker)
   {
      $user = new User();

      $user->name = 'Simone Sada';
      $user->email = 'si.sada93@gmail.com';
      $user->password = '$2y$10$JtgjO8EC9NehYwSNNZ8Ig.4eHEnX3n1iyqMJJpP9v.ZjRE3Po9ZkK';

      $user->save();
   }
}

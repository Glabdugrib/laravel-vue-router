<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

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
      $user->password = Hash::make('Password1');

      $user->save();
   }
}

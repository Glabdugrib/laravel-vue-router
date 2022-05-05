<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $categories = ['Cars', 'Food', 'Lifestyle', 'Sport', 'Trips', 'Videogames'];

      foreach($categories as $el) {

         $category = new Category();

         $category->name = $el;
         $category->slug = Str::slug( $el );

         $category->save();
      }
   }
}

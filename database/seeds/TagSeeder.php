<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(Faker $faker)
   {
      $tags = ['News', 'Kids', '18+'];

      foreach($tags as $el) {

        $tag = new Tag();

        $tag->name = $el;
        $tag->slug = Str::slug( $el );
        $tag->color = $faker->hexColor();

        $tag->save();
      }
   }
}

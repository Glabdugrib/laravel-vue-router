<?php

use App\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run(Faker $faker)
   {
      for ($i=0; $i < 100 ; $i++) { 

         $post = new Post();

         $post->title = $faker->words(7, true);
         $post->slug = Str::slug( $post->title );
         $post->content = $faker->paragraphs(5, true);
         $post->published_at = $faker->randomElement([ null, $faker->dateTime() ]);
         $post->category_id = $faker->randomElement([ null, 1, 2, 3, 4, 5, 6 ]);

         $post->save();
      }
   }
}

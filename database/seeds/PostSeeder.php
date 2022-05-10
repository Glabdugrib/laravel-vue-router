<?php

use App\Post;
use App\Category;
use App\Tag;
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
      // Per aggiungere dinamicamente le categorie ai post
      $categories = Category::all();
      $categoriesId = $categories->pluck('id')->all();

      $tags = Tag::all();
      $tagsId = $tags->pluck('id')->all();

      for ($i=0; $i < 300 ; $i++) { 

         $post = new Post();

         $post->title = $faker->words(7, true);
         $post->slug = Str::slug( $post->title );
         $post->content = $faker->paragraphs(5, true);
         $post->published_at = $faker->optional()->dateTime();
         $post->category_id = $faker->optional()->randomElement( $categoriesId );

         $post->save();

         $tagsNum = $faker->numberBetween(0, 2);
         $post->tags()->sync( $faker->randomElements( $tagsId, $tagsNum ) );
      }
   }
}

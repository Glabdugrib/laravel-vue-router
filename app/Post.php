<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
   protected $fillable = [
      'title',
      'content',
      'published_at',
      'slug'
   ];

   public static function getUniqueSlug( $title ) {
      $slug = Str::slug( $title );
      $slug_base = $slug;

      $counter = 1;

      // Cerca un post con lo slug indicato
      $post_present = Post::where('slug', $slug)->first();

      while( $post_present ) {
         $slug = $slug_base . '-' . $counter;
         $counter++;
         $post_present = Post::where('slug', $slug)->first();
      }

      return $slug;
   }

   public function getRouteKeyName()
   {
      return 'slug';
   }
}

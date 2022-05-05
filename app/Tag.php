<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{

   protected $fillable = [
      'name',
      'slug'
   ];


   public static function getUniqueSlug( $name ) {
      $slug = Str::slug( $name );
      $slug_base = $slug;

      $counter = 1;

      $tag_present = tag::where('slug', $slug)->first();

      while( $tag_present ) {
         $slug = $slug_base . '-' . $counter;
         $counter++;
         $tag_present = Tag::where('slug', $slug)->first();
      }

      return $slug;
   }


   public function getRouteKeyName()
   {
      return 'slug';
   }

   public function posts() {
      return $this->belognsToMany('App\Tag');
   }
}

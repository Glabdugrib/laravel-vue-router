<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
   public function posts() {
      return $this->hasMany('App\Post');
   }

   protected $fillable = [
      'name',
      'slug',
   ];

   public static function getUniqueSlug( $name ) {
      $slug = Str::slug( $name );
      $slug_base = $slug;

      $counter = 1;

      // Cerca una category con lo slug indicato
      $category_present = Category::where('slug', $slug)->first();

      while( $category_present ) {
         $slug = $slug_base . '-' . $counter;
         $counter++;
         $category_present = Category::where('slug', $slug)->first();
      }

      return $slug;
   }

   public function getRouteKeyName()
   {
      return 'slug';
   }
}

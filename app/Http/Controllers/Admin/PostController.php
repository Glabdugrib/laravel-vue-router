<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $posts = Post::all();

      return view('admin.posts.index', compact('posts') );
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.posts.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $request->validate([
         'title' => 'required|string|min:5|max:100',
         'content' => 'required|string|min:5|max:1000',
         // 'cover' => 'nullable|url',
         // 'slug' => 'nullable|string',
         'published_at' => 'nullable|date|before_or_equal:today',
      ]);

      $data = $request->all();

      $slug = Str::slug( $data['title'] );
      $slug_base = $slug;

      $counter = 1;

      // Cerca un post con lo slug indicato
      $post_present = Post::where('slug', $slug)->first();

      while( $post_present ) {
         $slug = $slug_base . '-' . $counter;
         $counter++;
         $post_present = Post::where('slug', $slug)->first();
      }

      $post = new Post();

      $post->fill( $data );
      $post->slug = $slug;

      $post->save();

      return redirect()->route('admin.posts.index');

   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

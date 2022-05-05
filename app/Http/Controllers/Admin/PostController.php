<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;

class PostController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $posts = Post::with(['category', 'tags'])->orderBy('created_at','desc')->limit(20)->get();

      return view('admin.posts.index', compact('posts') );
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      $categories = Category::orderBy('name')->get();
      $tags = Tag::orderBy('name')->get();
      return view('admin.posts.create', compact(['categories', 'tags']));
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
         'published_at' => 'nullable|date|before_or_equal:today',
         'category_id' => 'nullable|exists:categories,id',
         'tags.*' => 'exists:tags,id'
      ]);

      $data = $request->all();

      // dd($data['tags']);

      $slug = Post::getUniqueSlug( $data['title'] );

      $post = new Post();

      $post->fill( $data );
      $post->slug = $slug;

      $post->save();

      if( array_key_exists('tags', $data) ) {
         $post->tags()->sync( $data['tags'] );
      } else {
         $post->tags()->sync([]);
      }

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
   public function edit(Post $post)
   {
      $categories = Category::orderBy('name')->get();
      $tags = Tag::orderBy('name')->get();
      return view('admin.posts.edit', compact(['post', 'categories', 'tags']));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Post $post)
   {
      $request->validate([
         'title' => 'required|string|min:5|max:100',
         'content' => 'required|string|min:5|max:1000',
         'published_at' => 'nullable|date|before_or_equal:today',
         'category_id' => 'nullable|exists:categories,id',
         'tags.*' => 'exists:tags,id'
      ]);

      $data = $request->all();

      // dd($data['tags']);

      if( $post->title != $data['title'] ) {
         $slug = Post::getUniqueSlug( $data['title'] );
         $data['slug'] = $slug;
      }

      $post->update( $data );

      if( array_key_exists('tags', $data) ) {
         $post->tags()->sync( $data['tags'] );
      } else {
         $post->tags()->sync([]);
      }

      return redirect()->route('admin.posts.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Post $post)
   {
      $post->delete();

      return redirect()->route('admin.posts.index');
   }
}

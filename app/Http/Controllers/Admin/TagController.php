<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $tags = Tag::orderBy('id')->get();

      return view('admin.tags.index', compact('tags'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.tags.create');
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
         'name' => 'required|string|min:4|max:100',
         'color' => [
            'required',
            'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'
         ],
      ]);

      $data = $request->all();

      $slug = Tag::getUniqueSlug( $data['name'] );

      $tag = new Tag();

      $tag->fill( $data );
      $tag->slug = $slug;

      $tag->save();

      return redirect()->route('admin.tags.index');
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
   public function edit(Tag $tag)
   {
      return view('admin.tags.edit', compact('tag'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Tag $tag)
   {
      $request->validate([
         'name' => 'required|string|min:4|max:100',
         'color' => [
            'required',
            'regex:/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/'
         ],
      ]);

      $data = $request->all();

      if( $tag->name != $data['name'] ) {
         $slug = Tag::getUniqueSlug( $data['name'] );
         $data['slug'] = $slug;
      }

      $tag->update( $data );

      return redirect()->route('admin.tags.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Tag $tag)
   {
      $tag->delete();

      return redirect()->route('admin.tags.index');
   }
}

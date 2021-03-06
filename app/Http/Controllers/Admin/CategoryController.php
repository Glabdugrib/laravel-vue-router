<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $categories = Category::all();

      return view('admin.categories.index', compact('categories'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('admin.categories.create');
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
         'name' => 'required|string|min:5|max:100',
      ]);

      $data = $request->all();

      $slug = Category::getUniqueSlug( $data['name'] );

      $category = new Category();

      $category->fill( $data );
      $category->slug = $slug;

      $category->save();

      return redirect()->route('admin.categories.index');
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
   public function edit(Category $category)
   {
      return view('admin.categories.edit', compact('category'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, Category $category)
   {
      $request->validate([
         'name' => 'required|string|min:5|max:100',
      ]);

      $data = $request->all();

      if( $category->name != $data['name'] ) {
         $slug = Category::getUniqueSlug( $data['name'] );
         $data['slug'] = $slug;
      }

      $category->update( $data );

      return redirect()->route('admin.categories.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy(Category $category)
   {
      $category->delete();

      return redirect()->route('admin.categories.index');
   }
}

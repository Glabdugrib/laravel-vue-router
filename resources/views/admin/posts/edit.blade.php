@extends('layouts.app')

@section('content')

<div class="container py-5">

   <div class="row justify-content-center">
      <div class="col-5">

         <h2 class="mb-4">Edit post: {{ $post->title }}</h2>
         <form action="{{ route('admin.posts.update', $post) }}" method="POST" id="edit-form">
            @csrf
            @method('PUT')
            
            {{-- Titolo --}}
            <div class="form-group">
               <label for="name" class="form-label">Title</label>
               <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror form-control" value="{{ old('title', $post->title) }}" placeholder="Insert post's title">

               @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Categoria --}}
            <div class="form-group">
               <label for="category_id">Category</label>
               <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                  <option value="">-- Insert category --</option>
                  @foreach ($categories as $el)
                     <option {{ old('category_id', $post->category_id) == $el->id ? 'selected' : '' }} value="{{ $el->id }}">{{ $el->name }}</option>
                  @endforeach
               </select>

               @error('category_id')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Contenuto --}}
            <div class="form-group">
               <label for="name" class="form-label">Content</label>
               <textarea name="content" id="content" cols="30" rows="10" class="@error('content') is-invalid @enderror form-control" placeholder="Insert post's content">{{ old('content', $post->content) }}</textarea>
            
               @error('content')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Publish date --}}
            <div class="form-group">
               <label for="name" class="form-label">Publish date</label>
               <input type="date" name="published_at" id="published_at" class="@error('published_at') is-invalid @enderror form-control" value="{{ old('published_at', substr($post->published_at, 0, 10) ) }}" placeholder="Insert post's publish date">

               @error('published_at')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Reset & submit --}}
            <div class="button-wrapper text-center">
               {{-- <form action="{{ route( 'admin.posts.destroy', $post ) }}" method="POST" id="delete-form">
                  @csrf
                  @method('DELETE')
                  
                  <button for="delete-form" type="submit" class="btn btn-outline-danger" onclick="return confirm('Sicuro?')"> Elimina </button>
               </form>  --}}
               <button for="edit-form" type="reset" class="btn btn-outline-secondary">Reset</button>
               <button for="edit-form" type="submit" class="btn btn-outline-primary">Submit</button>
            </div>
            
         </form> 

      </div>
   </div>

</div>   
@endsection
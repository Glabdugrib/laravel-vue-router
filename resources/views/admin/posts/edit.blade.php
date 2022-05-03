@extends('layouts.app')

@section('content')

<div class="container py-5">

   <div class="row justify-content-center">
      <div class="col-5">

         <h2 class="mb-4">Edit post: {{ $post->title }}</h2>
         <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- Titolo --}}
            <div class="form-group">
               <label for="name" class="form-label">Title</label>
               <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror form-control" value="{{ old('title') ? old('title') : $post->title }}" placeholder="Insert post's title">

               @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Contenuto --}}
            <div class="form-group">
               <label for="name" class="form-label">Content</label>
               <textarea name="content" id="content" cols="30" rows="10" class="@error('content') is-invalid @enderror form-control" placeholder="Insert post's content">{{ old('content') ? old('content') : $post->content }}</textarea>
            
               @error('content')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Publish date --}}
            <div class="form-group">
               <label for="name" class="form-label">Publish date</label>
               <input type="date" name="published_at" id="published_at" class="@error('published_at') is-invalid @enderror form-control" value="{{ old('published_at') ? old('published_at') : $post->published_at }}" placeholder="Insert post's publish date">

               @error('published_at')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Reset & submit --}}
            <div class="text-center">
               <button type="reset" class="btn btn-secondary">Reset</button>
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
         </form> 

      </div>
   </div>

</div>   
@endsection
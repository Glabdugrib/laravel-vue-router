@extends('layouts.app')

@section('content')

<div class="container py-5">

   <div class="row justify-content-center">
      <div class="col-3">

         <h2 class="mb-4">Create new post</h2>
         <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            
            {{-- Titolo --}}
            <div class="form-group">
               <label for="name" class="form-label">Title</label>
               <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror form-control" value="{{ old('title') }}" placeholder="Insert post's title">

               @error('title')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Contenuto --}}
            <div class="form-group">
               <label for="name" class="form-label">Content</label>
               <textarea name="content" id="content" cols="30" rows="10" class="@error('content') is-invalid @enderror form-control" placeholder="Insert post's content">{{ old('content') }}</textarea>
            
               @error('content')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Publish date --}}
            <div class="form-group">
               <label for="name" class="form-label">Publish date</label>
               <input type="date" name="published_at" id="published_at" class="@error('published_at') is-invalid @enderror form-control" value="{{ old('published_at') }}" placeholder="Insert post's publish date">

               @error('published_at')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Thumbnail --}}
            {{-- <div class="form-group">
               <label for="name" class="form-label">Cover</label>
               <input type="text" name="cover" id="cover" class="@error('cover') is-invalid @enderror form-control" value="{{ old('cover') }}" placeholder="Insert post's cover">

               @error('cover')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div> --}}

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
@extends('layouts.app')

@section('content')

<div class="container py-5">

   <div class="row justify-content-center">
      <div class="col-5">

         <h2 class="mb-4">Edit post: <span class="text-primary font-italic">{{ $post->title }}</span></h2>
         <form action="{{ route('admin.posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- Titolo --}}
            <div class="form-group">
               <label for="name" class="form-label">Title</label>
               <input type="text" name="title" id="title" class="@error('title') is-invalid @enderror form-control" value="{{ old('title', optional($post)->title) }}" placeholder="Insert post's title">

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
                     <option {{ old('category_id', optional($post)->category_id) == $el->id ? 'selected' : '' }} value="{{ $el->id }}">{{ $el->name }}</option>
                  @endforeach
               </select>

               @error('category_id')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Tag --}}
            <div>
               <label>Tags</label>
               @foreach ($tags as $el)
                  <div class="form-check form-group">
                     <input class="form-check-input" {{ $post->tags->contains( $el ) ? 'checked' : '' }} type="checkbox" value="{{ $el->id }}" name="tags[]" id="tag-{{ $el->id }}">
                     <label class="form-check-label" for="tag-{{ $el->id }}">{{ $el->name }}</label>
                  </div>
               @endforeach
               @error('tags.*')
                  <div class="text-danger">The selected tag is invalid.</div>
               @enderror
            </div>

            {{-- Contenuto --}}
            <div class="form-group">
               <label for="name" class="form-label">Content</label>
               <textarea name="content" id="content" cols="30" rows="10" class="@error('content') is-invalid @enderror form-control" placeholder="Insert post's content">{{ old('content', optional($post)->content) }}</textarea>
            
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
            <div class="button-wrapper">
               <button type="submit" class="btn btn-outline-primary">Submit</button>
            </div> 
         </form> 

      </div>
   </div>

</div>   
@endsection
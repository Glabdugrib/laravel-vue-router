@extends('layouts.app')

@section('content')

<div class="container py-5">

   <div class="row justify-content-center">
      <div class="col-5">

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

            {{-- Categoria --}}
            <div class="form-group">
               <label for="category_id">Category</label>
               <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                  <option value="">-- Insert category --</option>
                  @foreach ($categories as $el)
                     <option {{ old('category_id') == $el->id ? 'selected' : '' }} value="{{ $el->id }}">{{ $el->name }}</option>
                  @endforeach
               </select>

               @error('category_id')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Tag --}}
            <div class="form-group">
               <label>Tags</label>
               {{-- @foreach ($collection as $item)
                   
               @endforeach --}}
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Default checkbox
                  </label>
                </div>
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

            {{-- Reset & submit --}}
            <div class="button-wrapper">
               <button type="reset" class="btn btn-secondary">Reset</button>
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>   
         </form> 

      </div>
   </div>

</div>   
@endsection
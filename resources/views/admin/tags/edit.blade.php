@extends('layouts.app')

@section('content')

<div class="container py-5">

   <div class="row justify-content-center">
      <div class="col-5">

         <h2 class="mb-4">Edit tag: <span class="text-primary font-italic">{{ $tag->name }}</span></h2>
         <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- Name --}}
            <div class="form-group">
               <label for="name" class="form-label">Name</label>
               <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name', optional($tag)->name) }}" placeholder="Insert tag's name">

               @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
               @enderror
            </div>

            {{-- Colors --}}
            <div class="form-group">
               <label for="color" class="form-label">Color</label>
               <input type="color" name="color" id="color" class="@error('color') is-invalid @enderror form-control" value="{{ old('color', optional($tag)->color) }}" placeholder="Insert tag's color">

               @error('color')
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
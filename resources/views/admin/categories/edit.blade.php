@extends('layouts.app')

@section('content')

<div class="container py-5">

   <div class="row justify-content-center">
      <div class="col-5">

         <h2 class="mb-4">Edit category: {{ $category->name }}</h2>
         <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            
            {{-- Name --}}
            <div class="form-group">
               <label for="name" class="form-label">Name</label>
               <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name', optional($category)->name) }}" placeholder="Insert post's name">

               @error('name')
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
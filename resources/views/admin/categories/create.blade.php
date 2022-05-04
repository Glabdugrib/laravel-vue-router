@extends('layouts.app')

@section('content')

<div class="container py-5">

   <div class="row justify-content-center">
      <div class="col-5">

         <h2 class="mb-4">Create new category</h2>
         <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            
            {{-- Name --}}
            <div class="form-group">
               <label for="name" class="form-label">Name</label>
               <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror form-control" value="{{ old('name') }}" placeholder="Insert category's name">

               @error('name')
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
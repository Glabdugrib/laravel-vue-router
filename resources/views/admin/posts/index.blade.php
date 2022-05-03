@extends('layouts.app')

@section('content')

   <ul>
      @foreach ($posts as $el)
         <li>
            {{ $el->title }}
            <a href="{{ route('admin.posts.edit', $el) }}" class="btn btn-outline-info btn-sm" style="min-width: 65px;">EDIT</a>
            <form action="{{ route( 'admin.posts.destroy', $el ) }}" method="POST">
               @csrf
               @method('DELETE')
               
               <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Sicuro?')"> Elimina </button>
            </form> 
         </li>
      @endforeach
   </ul>

@endsection
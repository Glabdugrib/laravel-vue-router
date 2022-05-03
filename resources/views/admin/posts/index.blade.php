@extends('layouts.app')

@section('content')

   <ul>
      @foreach ($posts as $el)
          <li>{{ $el->title }}</li>
      @endforeach
   </ul>

@endsection
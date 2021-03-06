@extends('layouts.app')

@section('content')

<main class="d-flex justify-content-center">

   <table>
      <tr>
         <th>ID</th>
         <th>Title</th>
         <th>Slug</th>
         <th>Category</th>
         <th>Tags</th>
         {{-- <th>Content</th> --}}
         {{-- <th>Cover</th> --}}
         <th>Published at</th>
         <th>Created at</th>
         <th>Updated at</th>
         <th></th>
         <th></th>
      </tr>
      @foreach ($posts as $el)
         <tr>
            <td>{{ $el->id }}</td>
            <td>{{ $el->title }}</td>
            <td>{{ $el->slug }}</td>
            <td>{{ $el->category ? $el->category->name : '-' }}</td>
            <td>
               @foreach ($el->tags as $t)
                  <span class="badge badge-pill" style="color: white; background-color: {{ $t->color }}">{{ $t->name }}</span>
               @endforeach
            </td>
            {{-- <td>{{ $el->content }}</td> --}}
            {{-- <td>{{ $el->cover ? $el->cover : '-' }}</td> --}}
            <td>{{ substr($el->published_at, 0, 10) }}</td>
            <td>{{ substr($el->created_at, 0, 10) }}</td>
            <td>{{ substr($el->updated_at, 0, 10) }}</td>
            <td>
               <a href="{{ route('admin.posts.edit', $el) }}" class="btn btn-outline-info btn-sm" style="min-width: 65px;">Edit</a>
            </td>
            <td>
               <form action="{{ route( 'admin.posts.destroy', $el ) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  
                  <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirm?')"> Delete </button>
               </form> 
            </td>
         </tr>
      @endforeach
   </table>

</main>

@endsection
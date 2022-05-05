@extends('layouts.app')

@section('content')

<main class="d-flex justify-content-center">

   <table>
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>Slug</th>
         <th>Color code</th>
         <th>Color</th>
         <th>Created at</th>
         <th>Updated at</th>
         <th></th>
         <th></th>
      </tr>
      @foreach ($tags as $el)
         <tr>
            <td>{{ $el->id }}</td>
            <td>{{ $el->name }}</td>
            <td>{{ $el->slug }}</td>
            <td>{{ $el->color }}</td>
            <td class="position-relative"><div class="swatch" style="background-color: {{ $el->color }}"></div></td>
            <td>{{ substr($el->created_at, 0, 10) }}</td>
            <td>{{ substr($el->updated_at, 0, 10) }}</td>
            <td>
               <a href="{{ route('admin.tags.edit', $el) }}" class="btn btn-outline-info btn-sm" style="min-width: 65px;">Edit</a>
            </td>
            <td>
               <form action="{{ route( 'admin.tags.destroy', $el ) }}" method="POST">
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
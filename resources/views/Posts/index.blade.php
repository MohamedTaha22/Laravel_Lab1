@extends('Layout.header')

@section('title') Index @endsection
@section('content')

<div class="text-center">
  <a href="{{route('posts.create')}}" class="mt-4 btn btn-success">Create Post</a>
</div>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>{{$post['id']}}</th>
        <td>{{$post['title']}}</td>
        <td>{{$post['posted_by']}}</td>
        <td>{{$post['creation_date']}}</td>
        <td>
            <form style="display: inline ;"  action="{{route('posts.show', $post['id'])}}" method="GET">
            @csrf
            @component('components.button')    
            @slot('class')
            info
            @endslot
            @slot('title')
            View
            @endslot
           @endcomponent
            </form>
            <form style="display: inline ;"  action="{{route('posts.edit', $post['id'])}}" method="GET">
            @csrf
            @component('components.button')    
            @slot('class')
            primary
            @endslot
            @slot('title')
            Edit
            @endslot
           @endcomponent
            </form>
            <form style="display: inline ;"  action="{{route('posts.destroy', $post['id'])}}" method="POST">
            @csrf
            @method('Delete')
            @component('components.button')    
            @slot('class')
                danger
            @endslot
            @slot('title')
                Delete
            @endslot
           @endcomponent
            </form>

            
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection

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
				<form style="display: inline ;" action="{{route('posts.show', $post['id'])}}" method="GET">
					@csrf
					<x-button class="info" text="View" />
				</form>
				<form style="display: inline ;" action="{{route('posts.edit', $post['id'])}}" method="GET">
					@csrf

					<x-button class="primary" text="Edit" />
				</form>
				<form style="display: inline ;" action="{{route('posts.destroy', $post['id'])}}" method="POST">
					@csrf
					@method('Delete')
					<x-button class="danger" text="Delete" />

				</form>


			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
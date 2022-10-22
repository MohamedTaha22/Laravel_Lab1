@extends('layout.header')

@section('title') Post {{$postId}} @endsection
@section('content')
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">Post info</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>Title : PHP</td> </tr>
    <tr><td>Description:</td>  </tr>
    <tr> <td>With Supporting</td>  </tr>
  </tbody>
</table>
<table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">Post Creator info</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>Name : Taha</td> </tr>
    <tr><td>Email: 123@123.com</td>  </tr>
    <tr> <td>Created At</td>  </tr>
  </tbody>
</table>
   
@endsection
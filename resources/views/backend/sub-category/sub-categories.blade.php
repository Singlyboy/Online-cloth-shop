@extends('backend.master')

@section('content_body')

<style>
  .a{

    font-size:30px;
    text-align:center;
  }
</style>

<div>
<h1 class="a">Sub Category</h1> 

<a href="{{route('sub.category.create')}}"  class="btn btn-primary">Create Sub Category</a><br>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    @foreach($sub_cat as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->description}}</td>
      <td>{{$data->status}}</td>
      <td>{{$data->image}}</td>
    </tr>
  @endforeach  
  </tbody>
      </table>

</div>

{{$sub_cat->links()}}
@endsection
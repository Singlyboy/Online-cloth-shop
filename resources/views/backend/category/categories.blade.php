@extends('backend.master')

@section('content_body')

<style>
  .a{

    font-size:30px;
    text-align:center;
  }
</style>

<div class="container-fluid px-4">

<h1 class="a"> Category </h1> 

                        

       <a href="{{route('category.create')}}"  class="btn btn-primary">Create Category</a><br>

       <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Sub Category</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>

@foreach($cat as $data)

    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->name}}</td>
      <td>{{optional($data->parent)->name}}</td>

      <td>{{$data->description}}</td>
      <td>{{$data->image}}</td>
    </tr>
  

@endforeach

  </tbody>
</table>  

<div>    

{{$cat->links()}}

@endsection
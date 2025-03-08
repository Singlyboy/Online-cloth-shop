@extends('backend.master')

@section('content_body')

<style>
  .a{

    font-size:30px;
    text-align:center;
  }
</style>

<div class="container-fluid px-4">

<h1 class="a"> Brands </h1> <br>
                        

       <a href="{{route('brand.create')}}"  class="btn btn-primary">Create Brand</a><br>

       <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">image</th>
    </tr>
  </thead>
  <tbody>
    @foreach($brand as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->description}}</td>
      <td>{{$data->image}}</td>
    </tr>
    @endforeach
  </tbody>
</table>  

<div>  
{{$brand->links()}}
@endsection
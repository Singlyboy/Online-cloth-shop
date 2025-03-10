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

<div class="col-lg-6">
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($brand as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->name}}</td>
      <td>{{$data->description}}</td>
      <td>
        <a href="{{route('brand.delete',$data->id)}}" class="btn btn-danger btn-sm">
          <i class="fas fa-trash"></i>
         </a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>  
</div>
<div>  
{{$brand->links()}}
@endsection
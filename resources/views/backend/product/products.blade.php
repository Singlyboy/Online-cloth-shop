@extends('backend.master')

@section('content_body')

<style>
  .a{

    font-size:30px;
    text-align:center;
  }
</style>

<div class="container-fluid px-4">

<h1 class="a"> Products </h1> <br>


<a href="{{route('product.create')}}"  class="btn btn-primary">Add New Product</a><br>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Category_name</th>
      <th scope="col">Brand_name</th>
      <th scope="col">product_name</th>
      <th scope="col">description</th>
      <th scope="col">image</th>
      <th scope="col">status</th>
      <th scope="col">buying_price</th>
      <th scope="col">selling_price</th>
      <th scope="col">Discount</th>
      <th scope="col">Stock</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pro as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>
      <a href="javascript:void(0);">{{ optional($data->category)->name }}</a>

      </td>
      <td>{{ optional($data->brand)->name }}</td>     <!-- Brand name -->

      <td>{{$data->product_name}}</td>
      <td>{{$data->description}}</td>
      <td>
        <img src="{{url('/backend/images/uploads/'.$data->image)}}" alt="" width=100px>
      </td>
      <td>{{$data->status}}</td>
      <td>{{$data->buying_price}}</td>
      <td>{{$data->selling_price}}</td>
      <td>{{$data->discount}}%</td> 
    
      <td>{{$data->stock}}</td>
     
      <td>
        <a href="{{route('product.update',$data->id)}}" class="btn btn-primary">Edit</a> <br>
        <a href="{{route('product.delete',$data->id)}}" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
      </table>

</div>
{{$pro->links()}}
@endsection
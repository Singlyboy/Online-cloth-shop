@extends('backend.master')

@section('content_body')


<style>
  .a{

    font-size:30px;
    text-align:center;
  }
</style>

<div class="container-fluid px-4">

<h1 class="a"> Customer List </h1> 


<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Address</th>
     
      <th scope="col">Action</th>

    </tr>
  </thead>
  
@foreach($allCustomers as $customer)
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>{{$customer->first_name}}</td>
      <td>{{$customer->email}}</td>
      <td>{{$customer->phone_number}}</td>
      <td>{{$customer->address}}</td>
      <td>{{$customer->email}}</td>
           <td>
        <a class="btn btn-primary" href="#">View</a>
       
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection
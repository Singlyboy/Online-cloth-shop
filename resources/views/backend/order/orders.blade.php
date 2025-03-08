@extends('backend.master')

@section('content_body')

<style>
  .a{

    font-size:30px;
    text-align:center;
  }
</style>

<div class="container-fluid px-4">

<h1 class="a"> Orders </h1> <br>




<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Receiver Name</th>     
      <th scope="col">customer Number</th>
      <th scope="col">customer Name</th>
      <th scope="col">Total Amount</th>
      <th scope="col">payment_type</th>
      <th scope="col">order_status</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($allOrders as $data)
    <tr>
      <td>{{$data->id}}</td>
      <td>{{$data->receiver_name}}</td>
      <td>{{$data->customer->first_name}}</td>
      <td>{{$data->customer->phone_number}}</td>
      <td>{{$data->total_amount}}</td>
      <td>{{$data->payment_type}}</td>
      <td>{{$data->status}}</td>
      <td>
      <a class="btn btn-primary" href="{{route('order.View',$data->id)}}">View</a>
      </td>
    </tr>

@endforeach 

    </tbody>
  </table>
  
  @endsection
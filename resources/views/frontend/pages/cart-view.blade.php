@extends('frontend.master')

@section('content')

<div class="card">

<section class="h-100">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0">Shopping Cart</h3>
          
        </div>
        <div class="card rounded-3 mb-4">
          <div class="card-body p-1">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <h6>Image</h6>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-200">Product Name</p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <h6>Quantity</h6>
              </div>

              <!-- Subtotal and Update Button -->
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 d-flex align-items-center">
                <h5 class="mb-0 me-3">Price</h5>
              </div>
              <h5>update</h5>
              
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>

              </form>
            </div>
          </div>
        </div>

        @foreach($cartData as $data)
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img src="{{url('/backend/images/uploads/'.$data['image'])}}" class="img-fluid rounded-3" alt="Product Image" width="100px">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">{{$data['product_name']}}</p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <form action="{{route('update.cart',$data['id'])}}" method="POST" class="d-flex align-items-center">
                  @csrf
                  @method('PUT')

                  <button type="button" class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                    <i class="fas fa-minus"></i>
                  </button>

                  <input id="quantity-{{$data['id']}}" min="1" name="quantity" value="{{$data['quantity']}}" type="number"
                    class="form-control form-control-sm text-center" style="max-width: 60px;" />

                  <button type="button" class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                    <i class="fas fa-plus"></i>
                  </button>
              </div>

              <!-- Subtotal and Update Button -->
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1 d-flex align-items-center">
                <h5 class="mb-0 me-3"> {{$data['subtotal']}}</h5>
              </div>
              <button type="submit" class="btn btn-warning active btn-sm">Update</button>

              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="{{route('cart.item.delete',$data['id'])}}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>

              </form>
            </div>
          </div>
        </div>
        @endforeach

        <div class="card">
          <div class="card-body">
            <a href="{{route('checkout')}}" class="btn btn-warning btn-block btn-lg">Proceed to Pay</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
</div>

@endsection



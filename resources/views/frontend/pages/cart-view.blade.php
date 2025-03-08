@extends('frontend.master')

@section('content')

<div class="card">



<section class="h-100">
  <div class="container h-100 py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0">Shopping Cart</h3>
          <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i
                  class="fas fa-angle-down mt-1"></i></a></p>
          </div>
        </div>

		@foreach($cartData as $data)
    
    


		<!-- array te "key" diye value pabo -->
		<!-- object e "->property" diye value -->
		
        <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
                <img
                  src="{{url('/backend/images/uploads/'.$data['image'])}}"
                  class="img-fluid rounded-3" alt="Cotton T-shirt" width="100px">
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2">{{$data['product_name']}}</p>
              </div>
              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                  <i class="fas fa-minus"></i>
                </button>

                <input id="form1" min="0" name="quantity" value="{{$data['quantity']}}" type="number"
                  class="form-control form-control-sm" />

                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                  onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                  <i class="fas fa-plus"></i>
                </button>
                
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"> {{$data['subtotal']}}</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="{{route('cart.item.delete',$data['id'])}}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
              </div>
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
@extends('frontend.master')


@section('content')

    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
            <img class="w-100 h-100" src="{{url('/backend/images/uploads/'.$singleProduct->image)}}" alt="Image">
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{$singleProduct->product_name}}</h3>
                <div class="d-flex mb-3">
                    
                   
                </div>

                <h3 class="font-weight-semi-bold mb-4">@if($singleProduct->discount > 0)
    <span class="mb-2"><del>{{$singleProduct->selling_price }} BDT</del></span>
    <span class="text-danger">
        {{ $singleProduct->selling_price - ($singleProduct->selling_price  * $singleProduct->discount / 100) }} BDT
    </span>
@else
    <span class="mb-2">{{$singleProduct->selling_price}} BDT</span> <!-- Use selling_price instead of price -->
@endif</h3>
                <p>Stock: {{$singleProduct->stock}} </p>
                <p class="mb-4">{{$singleProduct->description}}</p>
               
             
                <div class="d-flex align-items-center mb-4 pt-2">
                    
                    <a class="btn btn-primary" href="{{route('add.to.cart',$singleProduct->id)}}">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
</a>
 
                </div>
                <div class="d-flex pt-2">
                   
                </div>
            </div>
        </div>
        
    </div>
    <!-- Shop Detail End -->


@endsection
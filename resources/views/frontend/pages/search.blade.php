
@extends('frontend.master')


@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


   <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-12">
                <!-- Price Start -->
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by category</h5>
                    <form>
                    <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        Select Category
    </button>
    <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
        @foreach ($categories as $parent)
            <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="{{ route('product.under.category', $parent->id) }}">{{ $parent->name }}</a>
                @if($parent->children && $parent->children->isNotEmpty())
                    <ul class="dropdown-menu">
                        @foreach ($parent->children as $child)
                            <li><a class="dropdown-item" href="">{{ $child->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>



                        
                    </form>
                </div>
                <!-- Price End -->
                
                <!-- Color Start -->
                <!-- <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by color</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div> -->
                <!-- Color End -->

                <!-- Size Start -->
                <!-- <div class="mb-5">
                    <h5 class="font-weight-semi-bold mb-4">Filter by size</h5>
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="size-all">
                            <label class="custom-control-label" for="size-all">All Size</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-1">
                            <label class="custom-control-label" for="size-1">XS</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-2">
                            <label class="custom-control-label" for="size-2">S</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-3">
                            <label class="custom-control-label" for="size-3">M</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="size-4">
                            <label class="custom-control-label" for="size-4">L</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="size-5">
                            <label class="custom-control-label" for="size-5">XL</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div> -->
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                <p>
    {{ $products->count() }} items found for "{{ request()->search_key }}"
</p>
               
                    
                    @foreach($products as $data)
                    
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
    <div class="card product-item border-0 mb-4">
        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
            <img class="img-fluid w-100" src="{{url('/backend/images/uploads/'.$data->image)}}" alt="" width="500px">
        </div>
        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
       
        <h6 class="text-truncate mb-3">{{$data->product_name}}</h6>
@if($data->discount > 0)
    <span class="badge badge-success">{{$data->discount}}% offer </span>
@endif

          
           
            <div class="d-flex justify-content-center">
           
               
               
            <p class="text-dark fs-5 fw-bold mb-0">
            @if($data->discount > 0)
    <span class="mb-2"><del>{{$data->selling_price }} BDT</del></span>
    <span class="text-danger">
        {{ $data->selling_price - ($data->selling_price  * $data->discount / 100) }} BDT
    </span>
@else
    <span class="mb-2">{{$data->selling_price}} BDT</span> <!-- Use selling_price instead of price -->
@endif

               
            </div>
            <div class="d-flex justify-content-center mt-2">
                <!-- Stock Info -->
                <span class="badge badge-info p-2">Stock: {{$data->stock >0 ?  $data->stock : 'out of stock'}}</span>
                  
            </div>
        </div>
        <div class="card-footer d-flex justify-content-between bg-light border">
       

            <a href="{{route('product.view',$data->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
            @if ($data->stock > 0) 
            <a href="{{route('add.to.cart',$data->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            @else
            <a disabled href ="{{route('add.to.cart',$data->id)}}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
            @endif

        </div>
    </div>
</div>

                    @endforeach
                            
 
                
                   
                      </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
     


@endsection
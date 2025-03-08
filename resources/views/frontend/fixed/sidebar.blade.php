 <!-- Navbar Start -->
 <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Men's Collection <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Men's Shirts</a>
                                <a href="" class="dropdown-item">Men's Pants</a>
                                <a href="" class="dropdown-item">Men's T-Shirts</a>
                            </div>
                        </div> 
                        <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Women's Collection <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Women's Dresses</a>
                                <a href="" class="dropdown-item">Women's Sarees</a>
                                <a href="" class="dropdown-item">Women's Tops</a>
                            </div>
                        </div> 
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">Kids's Collection <i class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                <a href="" class="dropdown-item">Kid's Dresses</a>
                                <a href="" class="dropdown-item">Kid's Sarees</a>
                                <a href="" class="dropdown-item">Kid's Shirts</a>
                            </div>
                        </div>      
                    </div>
                    
                </nav>
            </div>
            
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('homepage')}}" class="nav-item nav-link active">Home</a>
                            <a href="{{route('products.list')}}" class="nav-item nav-link">Products</a>
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Mens</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Mens Shirts</a>
                                    <a href="checkout.html" class="dropdown-item">Mens Pants</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Womens</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Womens Dress</a>
                                    <a href="checkout.html" class="dropdown-item">Womens Sarees</a>
                                </div>
                            </div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kid's</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="cart.html" class="dropdown-item">Kids Shirts</a>
                                    <a href="checkout.html" class="dropdown-item">Kids Dress</a>
                                </div>
                            </div>

                            <a href="contact.html" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            
                            @guest('customerGuard')
                            <a href="{{route('customer.login')}}"  class="nav-item nav-link" data-toggle="modal" data-target="#loginModal">
                                <span>
                                Login
                                </span>    
                            </a>
                            @endguest
                            @auth('customerGuard')

                         <a href="{{route('view.profile')}}" class=""style="padding: 15px 30px;" >{{auth('customerGuard')->user()->first_name}}</a>

                    <a href="{{route('customer.logout')}}" class=""style="padding: 15px 30px;">Logout</a>
                                @endauth     


                            <a href="{{route('registration')}}" class="nav-item nav-link">Register</a>
                        </div>
                    </div>
                </nav>
                



<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        
        <form action="{{route('customer.login')}}" method="POST">
                @csrf

            <div class="form-group">
                <label for="exampleInputEmail1">Enter Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Enter Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        </div>
      <div class="modal-footer">
        <p class="text-center w-100">Don't have an account? <a href="{{route('registration')}}">Register here</a></p> <br>     
      </div>
    </div>
  </div>
</div>
     
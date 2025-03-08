@extends('backend.master')

@section('content_body')

<style>
  .a{

    font-size:30px;
    text-align:center;
  }
</style>
<div>
<h1 class="a">Product Form Fill-up</h1> 

<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">

@csrf


<div class="form-group">
  <label for="exampleInputEmail1">Category</label>
     <select class="form-select form-control" aria-label="Default select example" name="p_category">
    <option selected>Open this select category</option>
       @foreach ($allCategory as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
 @endforeach
   </select>
 </div>

<div class="form-group">
  <label for="exampleInputEmail1">Brand</label>
     <select class="form-select form-control" aria-label="Default select example" name="p_brand">
    <option selected>Open this select category</option>
       @foreach ($allBrands as $brand)
    <option value="{{$brand->id}}">{{$brand->name}}</option>
 @endforeach
   </select>
 </div>


  <div class="form-group">
    <label for="A">Enter Product Name</label>
    <input type="text" required name="prod_name" class="form-control" id="A" aria-describedby="emailHelp" placeholder="Enter Product name">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter Description">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Enter an image file">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Buying Price</label>
    <input type="double" name="buy_price" class="form-control" id="exampleInputPassword1" placeholder="Enter Buying Price">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Selling Price</label>
    <input type="double" name="sell_price" class="form-control" id="exampleInputPassword1" placeholder="Enter Selling Price">
  </div>
  <div class="form-group">
    <label for="name">Discount</label>
    <input class="form-control"  name="par_discount" type="number" min="1" id="" placeholder="Enter Prats Discount">
  </div>
  <div class="form-group">
    <label for="name">Enter Stock:</label>
    <input required name="par_stock" type="number" min="1" class="form-control" id="" placeholder="Enter parts stock">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <select name="status" id="" class="form-control">
      <option value="Active">Active</option>
      <option value="Inactive">Inactive</option>
    </select>
  </div>
 

  <br>
  <button type="submit" class="btn btn-primary active">Submit</button>

</form> 

</div>

@endsection
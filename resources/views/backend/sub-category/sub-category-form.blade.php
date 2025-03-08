@extends('backend.master')

@section('content_body')

<style>
  .a{

    font-size:30px;
    text-align:center;
  }
</style>
<div>
<h1 class="a">Sub Category Form Fill-up</h1> 

<form action="{{route('sub.category.store')}}" method="post">
@csrf

  
  <div class="form-group">
    <label for="A">Enter Sub Category Name</label>
    <input type="text" name="sub_cat_name" class="form-control" id="A" aria-describedby="emailHelp" placeholder="Enter sub category name">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Enter Description">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <select name="status" id="" class="form-control">
      <option value="Active">Active</option>
      <option value="Inactive">Inactive</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Enter an image file">
  </div>

  <br>
  <button type="submit" class="btn btn-primary active">Submit</button>

</form> 

</div>

@endsection
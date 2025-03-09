<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $latest=Product::orderBy('id','desc')->limit(4)->get();

        return view('frontend.pages.home',compact('latest'));
    }
    public function productUnderCategory($id)
    {
        $categories = Category::all();
        $products=Product::where('category_id',$id)->get();

       return view('frontend.pages.product-under-category',compact('products','categories'));

    }
    public function search()
    {
      // dd(request()->all());
      $categories = Category::all();
    $products = Product::where('product_name', 'LIKE', '%' . request()->search_key . '%')->get();


      return view('frontend.pages.search',compact('products','categories'));
}
}
<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(){
        $pro=Product::paginate(20);
        $categories = Category::all();
        return view('frontend.pages.products',compact('pro','categories'));
    }


    public function productView($product_id)
    {

       $singleProduct=Product::find($product_id);
        return view('frontend.pages.product-view',compact('singleProduct'));
    }
}

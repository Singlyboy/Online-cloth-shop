<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
   public function Products()
{
    // Load products with their associated category and brand
    $pro = Product::with('category', 'brand')->paginate(20);

    // Pass the products to the view
    return view('backend.product.products', compact('pro'));
}


    public function ProductCreate(){
      $allCategory=Category::all();
      $allBrands = Brand::all();
        return view('backend.product.product-create-form',compact('allCategory', 'allBrands'));
    }
    public function ProductStore(Request $request){
        // dd($request->all());

     $validation=Validator::make($request->all(),[
        'p_category'=>'required',
        'p_brand' => 'required',
        'prod_name'=>'required',
        'par_stock'=>'required|numeric|min:1',
        'par_discount'=>'nullable|numeric|min:1',           
        'description'=>'required',
        'buy_price'=>'required',
        'sell_price'=>'required'

     ]);
     if($validation->fails()){
        notify()->error($validation->getMessageBag());
        return redirect()->back();
     }


     //file upload
     $fileName='';
     if($request->hasFile('image'))
     {
        //genarate a unique name
        $file=$request->file('image');
        $fileName=date('Ymdhis').'.'.$file->getClientOriginalExtension();

        //store file
        $file->storeAs('/backend/images/uploads',$fileName);

     }


           Product::create([
            'category_id'=>$request->p_category,
            'brand_id' => $request->p_brand,
            'product_name'=>$request->prod_name,
            'description'=>$request->description,
            'image'=>$fileName,
            'status'=>$request->status,
            'buying_price'=>$request->buy_price,
            'selling_price'=>$request->sell_price,
            'discount'=>$request->par_discount,
            'stock'=>$request->par_stock

        ]);
        notify()->success('Product Added Successfully');
         return redirect()->route('products');
    }

    public function ProductDelete($id){
      Product::find($id)->delete();
      notify()->success('Product deleted successfully');
      return redirect()->back();
    }
   
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function Brands(){
        $brand=Brand::paginate(10);
        return view('backend.brand.brands',compact('brand'));
    }
    public function BrandCreate(){
        return view('backend.brand.brand-create');
    }
    public function BrandStore(Request $request){

       Brand::create([
        'name'=>$request->brand_name,
        'description'=>$request->description,
        'image'=>$request->image
       ]);

       notify()->success('Brand Created');
       return redirect()->route('brands');
    }

    public function Brand_del($b_id){
        $brand = Brand::find($b_id);
        $brand -> delete();
        notify()->error('Brand Deleted');
        return redirect()->back();

    }
}

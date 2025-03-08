<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class SubCategoryController extends Controller
{
    public function SubCategories(){
        $sub_cat = SubCategory::paginate(3);

        return view('backend.sub-category.sub-categories',compact('sub_cat'));
    }
    public function SubCategoryCreate(){
        return view('backend.sub-category.sub-category-form');
    }
    public function SubCategoryStore(Request $request){

        $validation=Validator::make($request->all(),[

            'sub_cat_name'=>'required',
            'description'=>'required',

        ]);

        if($validation->fails())
        {
            notify()->error($validation->getMessageBag());
            return redirect()->back();   
        }
        

        SubCategory::Create([

            'name'=>$request->sub_cat_name,
            'description'=>$request->description,
            'status'=>$request->status
        ]);
        notify()->success('Sub Category Created Successfully.');
        return redirect()->back();
    }
}

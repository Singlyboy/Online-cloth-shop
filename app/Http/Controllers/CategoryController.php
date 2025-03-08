<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function Categories(){
        $cat = Category::with('parent')->paginate(3); 
        return view('backend.category.categories', compact('cat'));
    }
    

    public function CategoryCreate(){
        $categories = Category::with('childs')->whereNull('parent_id')->get();
        return view('backend.category.category-create-form', compact('categories'));

    }

    public function CategoryStore(Request $request){

 
        $validation = Validator::make($request->all(),[
         'cat_name'=>'required',
         'description'=>'required',

        ]);

        if($validation->fails())
        {
        notify()->error($validation->getMessageBag());
         return redirect()->back();
        }

        Category::create([

            'name'=>$request->cat_name,
            'parent_id' => $request->parent_id,
            'description'=>$request->description


        ]);

        notify()->success('Category Created Successfully.');
return redirect()->back();
    }
}

    

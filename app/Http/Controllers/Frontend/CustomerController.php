<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function registration(){
        return view('frontend.customer.registration');
    }

    public function registrationSubmit(Request $request){
        $validation=Validator::make($request->all(),[

            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'phone_number'=>'required|max:15|min:11',
            'address'=>'required',
            'password'=>'required|min:6|confirmed',

        ]);
        if ($validation->fails()){
            // dd($validation->getMessageBag());

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
                $file->storeAs('/frontend/uploads',$fileName);

            }

        Customer::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address,
            'password'=>bcrypt($request->password),
            'status'=>$request->status,
            'image'=>$fileName
        ]); 

        notify()->success('Customer registration successful');
        return redirect()->route('homepage');

    }

    public function customerLogin(Request $request){
        
        $validation=Validator::make($request->all(),[

            'email'=>'required|email',
            'password'=>'required|min:6'

        ]);
        if($validation->fails()){
            // dd($validation->getMessageBag());

            notify()->error($validation->getMessageBag());
            return redirect()->back();

        }
        $form_data=$request->except('_token');
        // dd($form_data);

        // if (Auth::guard('customerGuard')->attempt());
        $check=Auth('customerGuard')->attempt($form_data);
        
        if($check)
        {
            notify()->success('Login Successful');
            return redirect()->route('homepage');
        }
        else{
            notify()->error('Login Failed');
            return redirect()->back();
            
        }

    }
    public function customerLogout(){
        Auth::guard('customerGuard')->Logout();
        notify()->success('Customer Logout Successfull');
        return redirect()->route('homepage');

    }
    public function viewProfile()
    {
  
        $orders=Order::where('customer_id',auth('customerGuard')->user()->id)->get();
        
        return view('frontend.pages.profile',compact('orders'));
    }
    public function cancelOrder ($id)
    {
      $order=Order::find($id);
      $order->update([ 
          'status'=>'cancel'
      ]);
      $items=Orderdetails::where('order_id',$id)->get();
      foreach($items as $item)
      {
       $product=Product::find($item->product_id);
  
       $product->increment('stock',$item->quanity);
      }
  
      
      notify()->success('Order cancelled.');
      return redirect()->back();
  
    }
}

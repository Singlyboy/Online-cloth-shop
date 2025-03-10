<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Orders(){

        $allOrders = Order::with('customer')->orderBy('created_at', 'desc')->paginate(20); 
            return view('backend.order.orders', compact('allOrders'));
       
    }
    public function orderView($id)
    {

        $orders=Order::find($id);
        return view ('backend.order.orderView',compact('orders'));
    }
    public function orderStatus(Request $request,$id){

        $orders=Order::find($id);
    //    dd($orders);
        $orders->update([
            'status'=>$request->order_status]);
            return redirect()->route('order.list');


    }
}

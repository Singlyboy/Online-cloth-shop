<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

   public function Home(){

      $customerCount=Customer::count();

      $totalSale=Order::sum('total_amount');
      $productCount=Product::count();
      $orderCount=Order::count();
      $todaySale = Order::whereDate('created_at', Carbon::today())
      ->where('status', 'Confirm')
       ->sum('total_amount');
      $todayOrder=Order::whereDate('created_at', Carbon::today())->count();
      
      $pendingOrder=Order::whereDate('created_at', Carbon::today())
      ->where('status', 'pending')->count();
   
   
      return view('backend.pages.dashboard',compact('customerCount','totalSale','productCount','orderCount','todaySale','todayOrder','pendingOrder'));
  }
  
}

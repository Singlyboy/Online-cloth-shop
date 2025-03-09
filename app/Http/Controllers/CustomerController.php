<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   
    public function customers(){
        $allCustomers = Customer::paginate(5);
        return view('backend.customer.customers',compact('allCustomers'));
}
}

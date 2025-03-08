<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function Customers(){
        return view('backend.customer.customers'); 
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login(){
        return view ('backend.admin.login');
    }

    public function LoginSubmit(Request $request){

        // dd($request->all());

        $credential=$request->except('_token');

        // dd($credential);

        $check=Auth::attempt($credential);
        if($check){
            notify()->success('Login Successfull');
            return redirect()->route('dashboard');
        }
        else{
            // notify()->error('Login Failed');
            return redirect()->back();
        }
    }
    public function Logout(){
        Auth::Logout();
        notify()->success('Logout Successfull');
        return redirect()->route('login');
    
    }

}

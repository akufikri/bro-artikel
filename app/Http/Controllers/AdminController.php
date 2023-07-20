<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{   
    public function admin(){
        return view('login');
    }
     public function postlogin(Request $request){
       if (Auth::attempt($request->only('email','password'))) {
        return redirect('/dashboard');
       }
       return redirect('admin');
    }
    public function logout_admin(){
        Auth::logout();
        return redirect('admin');
    }
}
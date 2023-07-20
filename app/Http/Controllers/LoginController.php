<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function register(Request $request){
        User::create([
            'name' => $request->name,
            'level' => 'pengunjung',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'repeat_password' => $request->repeat_password,
            'remember_token' => Str::random(60),
            
        ]);
        return back()->with('success', 'Data sucess di buat');
    }
    public function loged(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
        return redirect('/');
       }
       return back()->with('success', 'Success login');
    }
    public function logouted(){
         Auth::logout();
         return redirect()->back();
    }
}
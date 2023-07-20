<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $artikel = Artikel::all();
        $user = User::all();
        return view('dashboard', compact('artikel', 'user'));
    }
}
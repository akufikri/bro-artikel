<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\Response;

class CekLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels): Response
    {
        if (in_array($request->user()->level,$levels)) {
            return $next($request);
        }
        return redirect('dashboard');
        
        // if (Auth::check() && Auth::user()->isPengunjung) {
        //     // Jika iya, arahkan ke halaman dashboard admin atau halaman lain yang sesuai
        //     return redirect('/');// Ganti 'admin.dashboard' dengan rute dashboard admin
        // }
        // return $next($request);

        
        
    }
}
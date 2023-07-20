<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekPengunjung
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {// Memeriksa apakah user saat ini adalah admin
        if (Auth::check() && Auth::user()->isPengunjung) {
            // Jika iya, arahkan ke halaman dashboard admin atau halaman lain yang sesuai
            return redirect('/');// Ganti 'admin.dashboard' dengan rute dashboard admin
        }
        return $next($request);
    }
}
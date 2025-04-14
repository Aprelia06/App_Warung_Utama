<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  mixed  ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

        public function handle(Request $request, Closure $next, ...$roles)
        {
            if (!Auth::check()) {
                return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
            }
    
            if (!in_array(Auth::user()->role, $roles)) {
                return redirect('/')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            }
    
            return $next($request);
        }
    }
    
    


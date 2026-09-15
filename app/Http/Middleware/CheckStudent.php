<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;  
class CheckStudent
{
    public function handle($request, Closure $next)
    {
       
        if (Auth::check() && Auth::user()->role === 'STUDENT') {
            return $next($request);
        }
        
        return redirect('/login');
    }
}
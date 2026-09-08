// app/Http/Middleware/Checkrole.php
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Checkrole
{
    public function handle(Request $request, Closure $next): Response
    {
        
        if (!$request->user()) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

     
        if ($request->user()->role !== 'TEACHER') {
            return redirect()->back()->with('error', 'Only teachers can access this page');
        }

        $request->merge(['teacher_id' => auth()->id()]);

        return $next($request);
    }
}

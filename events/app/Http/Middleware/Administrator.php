<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Administrator
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role->name != 'admin') {
            return redirect()->route('user.home');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Usertype;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()->usertype->name != 'admin') {
            return redirect()->back()->with('status', 'You are not authorized to use this route!!!');
        }

        return $next($request);
    }
}

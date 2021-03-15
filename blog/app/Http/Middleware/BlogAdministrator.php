<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlogAdministrator
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
        if($request->user()->type->type != 'admin') {
            return redirect()->route('home')->with('status', 'Only admin can change status of a theme!!!');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request):
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('admin')->check())
        {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}

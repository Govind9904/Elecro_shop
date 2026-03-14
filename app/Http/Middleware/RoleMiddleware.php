<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::guard('admin')->check()) {
            return redirect('/admin/login');
        }

        $admin = Auth::guard('admin')->user();

        if (!in_array($admin->role, $roles)) {
            abort(403,'Unauthorized');
        }

        return $next($request);
    }
}

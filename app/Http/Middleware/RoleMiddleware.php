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
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::guest()) {
            return redirect()->route("home");
        }

        $user = Auth::guard()->user();

        if ($user->role != $role) {
            return redirect()->route("home");
        }

        return $next($request);
    }
}

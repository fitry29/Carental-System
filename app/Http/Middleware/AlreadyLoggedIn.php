<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AlreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            // Ambil role user
            $role = Auth::user()->role_label; // assume awak ada accessor getRoleLabelAttribute()

            // Redirect ikut role
            if(in_array($role, ['admin', 'staff'])) {
                return redirect()->route('dashboard');
            } elseif($role === 'customer') {
                return redirect()->route('customer.dashboard');
            }
        }
        return $next($request);

    }
}

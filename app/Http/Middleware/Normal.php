<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Normal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admins')->check() && Auth::guard('admins')->user()->role == 3 ) {
            if(url()->current() == route('admin.login_form') || url()->current() == route('admin.register_form')){
                return back();
            }
            return $next($request);
        }

        return redirect('/admin')->with('error', 'Unauthorized access.');
    }
}

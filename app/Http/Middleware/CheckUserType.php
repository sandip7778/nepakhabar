<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (Auth::check() && Auth::user()->userType === 'admin') {
    //         return $next($request);
    //     } elseif (Auth::check() && Auth::user()->userType === 'editor') {
    //         return $next($request);
    //     } elseif (Auth::check() && Auth::user()->userType === 'reporter') {
    //         return $next($request);
    //     } else {
    //         // Redirect the user if they are not of the specified type
    //         return redirect('/');
    //     }

    // }

    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();
        if (!$user || $user->userType !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);


    }
}

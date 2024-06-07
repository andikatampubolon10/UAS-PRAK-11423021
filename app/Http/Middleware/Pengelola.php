<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Pengelola
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role == "Pengelola") {
            return $next($request);
        }
        return redirect()->back()->with('error', "you don't have access to Admin");
        abort(403, 'Akses anda ditolak');
    }
}

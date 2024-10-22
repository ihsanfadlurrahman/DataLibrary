<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $departement): Response
    {
        if(auth()->user()->departement == $departement){
            return $next($request);
        }
        return response()->json(['Anda tidak mempunyai hak untuk mengakses halaman ini.']);
    }
}

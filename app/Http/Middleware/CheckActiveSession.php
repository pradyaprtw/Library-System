<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckActiveSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        Log::info('User Role: ' . Auth::user()->role_id);
        // Jika sudah login dan role tidak sesuai, redirect sesuai role
        if (auth()->user()->role_id != $role) {
            return redirect('/login')->with('error', 'Anda harus login sebagai ' . $role);
        }
    
        return $next($request);
    }    
}

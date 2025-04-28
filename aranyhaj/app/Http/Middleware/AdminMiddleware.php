<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->admin == 2) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Nincs jogosultságod az admin felülethez!');
    }
}
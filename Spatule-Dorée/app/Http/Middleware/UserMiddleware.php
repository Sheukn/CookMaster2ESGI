<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifier si l'utilisateur a le rôle "utilisateur"
        if (!auth()->user() || auth()->user()->role !== 'utilisateur') {
            return redirect('/page-non-autorisee');
        }

        return $next($request);
    }
}

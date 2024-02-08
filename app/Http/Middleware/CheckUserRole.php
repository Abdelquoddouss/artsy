<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            // Vérifier le rôle de l'utilisateur
            $userRole = Auth::user()->role_id;

            if ($role === 'admin' && $userRole === 1) {
                return $next($request); // Laisser passer l'utilisateur
            } elseif ($role === 'user' && $userRole === 2) {
                return $next($request); // Laisser passer l'utilisateur
            }
        }

        // Rediriger vers la page de connexion si l'utilisateur n'est pas authentifié ou n'a pas le bon rôle
        return redirect('/login');  
    }
    
}

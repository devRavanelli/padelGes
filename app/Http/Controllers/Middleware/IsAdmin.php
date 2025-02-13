<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect('/guest/index'); // O la ruta que uses para login
        }

        // Verificar si el usuario tiene rol "admin"
        if (Auth::user()->rol !== 'admin') {
            abort(403); // Código 403 (Prohibido)
        }

        return $next($request);
    }
}


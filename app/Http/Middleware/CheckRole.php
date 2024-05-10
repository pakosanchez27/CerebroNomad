<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
{
    // Verificar si el usuario está autenticado
    if (! $request->user()) {
        abort(403, 'No estás autenticado.');
    }

    // Verificar si el usuario tiene al menos uno de los roles proporcionados
    foreach ($roles as $role) {
        if ($request->user()->hasRole($role)) {
            return $next($request);
        }
    }

    // Si el usuario no tiene ninguno de los roles proporcionados, abortar con un código 403
    abort(403, 'No tienes autorización para acceder a esta página.');
}
}

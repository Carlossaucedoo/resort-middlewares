<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Deja pasar solo a los administradores. Va después de CheckAuth, así que el usuario ya ha iniciado sesión.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::user()->is_admin) {
            abort(403, 'Zona restringida. Solo para administradores.');
        }

        return $next($request);
    }
}

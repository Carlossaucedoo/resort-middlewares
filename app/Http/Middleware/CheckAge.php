<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Deja pasar solo a los mayores de edad. Va después de CheckAuth, así que el usuario ya ha iniciado sesión.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->age < 18) {
            return redirect()->route('panel')->with('error', 'Acceso denegado: Debes ser mayor de edad');
        }

        return $next($request);
    }
}

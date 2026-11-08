<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Recepción del resort (pública).
     */
    public function home(): View
    {
        return view('home');
    }

    /**
     * Habitación del cliente (requiere sesión).
     */
    public function panel(): View
    {
        return view('panel-usuario');
    }

    /**
     * Sala de juegos (requiere sesión y ser mayor de edad).
     */
    public function casino(): View
    {
        return view('casino');
    }

    /**
     * Oficina de dirección (requiere sesión y ser administrador).
     */
    public function admin(): View
    {
        return view('panel-admin');
    }
}

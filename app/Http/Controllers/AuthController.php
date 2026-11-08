<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Throwable;

class AuthController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function showLogin(): View
    {
        return view('login');
    }

    /**
     * Comprueba las credenciales con Auth::attempt e inicia la sesión.
     */
    public function login(Request $request): RedirectResponse
    {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            return redirect()->route('panel');
        }

        return back()
            ->withErrors(['email' => 'El email o la contraseña no son correctos.'])
            ->onlyInput('email');
    }

    /**
     * Muestra el formulario de registro.
     */
    public function showRegister(): View
    {
        return view('register');
    }

    /**
     * Crea una cuenta de cliente (nunca administrador) e inicia la sesión.
     */
    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'age' => 'required|integer|min:1|max:120',
            'password' => 'required|string|min:8|max:255|confirmed',
        ]);

        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'age' => $data['age'],
                'password' => Hash::make($data['password']),
            ]);

            Auth::login($user);
            $request->session()->regenerate();

            return redirect()->route('panel')->with('status', 'Cuenta creada. ¡Bienvenido al resort!');
        } catch (Throwable $e) {
            report($e);

            return back()
                ->withErrors(['email' => 'Error al crear la cuenta.'])
                ->withInput($request->except('password', 'password_confirmation'));
        }
    }

    /**
     * Cierra la sesión y vuelve a la recepción.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}

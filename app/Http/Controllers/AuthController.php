<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('guest.login');
    }

    // Procesar el login
    public function login(Request $request)
    {
        $request->validate([
            'dni' => 'required',
            'password' => 'required',
        ]);

        // Datos de login
        $credentials = [
            'dni' => $request->dni,
            'password' => $request->password,
        ];

        // Intentar el login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $usuario = Auth::user();
            $rol = $usuario->rol;

            // Respuesta exitosa para AJAX
            return response()->json([
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'redirect' => $rol === 'admin' ? route('admin.usuarios.mostrar') : route('guest.index'),  // Redirigir según el rol
            ]);
        }

        // Si las credenciales no son correctas
        return response()->json([
            'success' => false,
            'message' => 'DNI o contraseña incorrectos',
        ]);
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

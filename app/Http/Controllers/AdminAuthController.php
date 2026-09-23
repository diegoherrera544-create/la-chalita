<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect('/productos');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt(array_merge($credentials, ['is_admin' => true]))) {
            return back()->withErrors([
                'email' => 'Las credenciales no coinciden o no sos administrador.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        $usuarioId = Auth::id();
        $clave = "admin_sesion_{$usuarioId}";
        $minutos = (int) config('session.lifetime', 120);

        $disponible = Cache::lock("admin_bloqueo_{$usuarioId}", 10)
            ->block(5, function () use ($clave, $request, $minutos) {
                if (Cache::has($clave)) {
                    return false;
                }

                Cache::put(
                    $clave,
                    $request->session()->getId(),
                    now()->addMinutes($minutos)
                );

                return true;
            });

        if (! $disponible) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login')->withErrors([
                'sesion' => 'Esta cuenta de administrador ya está abierta en otro navegador. Cerrá esa sesión o esperá a que venza por inactividad.',
            ])->onlyInput('email');
        }

        return redirect()->intended('/productos');
    }

    public function logout(Request $request)
    {
        if (Auth::check() && Auth::user()->is_admin) {
            $usuarioId = Auth::id();
            $clave = "admin_sesion_{$usuarioId}";
            $sesionActual = $request->session()->getId();

            Cache::lock("admin_bloqueo_{$usuarioId}", 10)
                ->block(5, function () use ($clave, $sesionActual) {
                    if (Cache::get($clave) === $sesionActual) {
                        Cache::forget($clave);
                    }
                });
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SingleAdminSession
{
    public function handle(Request $request, Closure $next)
    {
        $usuarioId = Auth::id();
        $clave = "admin_sesion_{$usuarioId}";
        $sesionActual = $request->session()->getId();
        $minutos = (int) config('session.lifetime', 120);

        $sesionValida = Cache::lock("admin_bloqueo_{$usuarioId}", 10)
            ->block(5, function () use ($clave, $sesionActual, $minutos) {
                if (Cache::get($clave) !== $sesionActual) {
                    return false;
                }

                Cache::put(
                    $clave,
                    $sesionActual,
                    now()->addMinutes($minutos)
                );

                return true;
            });

        if (! $sesionValida) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('admin.login')->withErrors([
                'email' => 'La sesión de administrador venció o ya no está activa.',
            ]);
        }

        return $next($request);
    }
}
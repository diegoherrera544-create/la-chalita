<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Middleware\SingleAdminSession;

// Sitio público
Route::get('/', [HomeController::class, 'index']);
Route::get('/contacto', function () {
    return view('contactos.contacto');
})->name('contacto');

Route::post('/contacto', [MensajeController::class, 'store'])
    ->name('contacto.enviar');

// Ingreso y salida del administrador
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

// Panel: requiere iniciar sesión, ser admin y tener la sesión autorizada
Route::middleware([
    'auth',
    'is_admin',
    SingleAdminSession::class,
])->group(function () {
    Route::resource('productos', ProductoController::class);

    Route::get('/mensajes', [MensajeController::class, 'index'])
        ->name('mensajes');

    Route::delete('/mensajes/{mensaje}', [MensajeController::class, 'destroy'])
        ->name('mensajes.destroy');
});
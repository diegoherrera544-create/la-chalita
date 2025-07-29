<?php

use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('cliente.index');
    
}); */
Route::middleware(['auth', 'is_admin'])->group(function () {
Route::resource('productos', ProductoController::class);
Route::get('/mensajes', [MensajeController::class, 'index'])->name('mensajes');
Route::delete('/mensajes/{mensaje}', [MensajeController::class, 'destroy'])->name('mensajes.destroy');
});

/* Route::get('/', function () { $productos = Producto::all(); return view('cliente.index', compact('productos'));
}); */

Route::get('/contacto', function () { return view('contactos.contacto'); })->name('contacto');
Route::post('/contacto', [MensajeController::class, 'store'])->name('contacto.enviar');

Route::get('/', [HomeController::class, 'index']);

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');






<?php

use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

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

Route::get('/', function () {
    return view('cliente.index');
    
});

Route::resource('productos', ProductoController::class);

Route::get('/', function () { $productos = Producto::all(); return view('cliente.index', compact('productos'));
});

Route::get('/contacto', function () { return view('contactos.contacto'); })->name('contacto');





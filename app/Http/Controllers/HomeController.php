<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class HomeController extends Controller
{
     public function index()
    {
        $productosCarrusel = Producto::where('en_carrusel', true)->get();
        $productos = Producto::all(); // o filtrar solo los que no están en carrusel si querés

        return view('cliente.index', compact('productosCarrusel', 'productos'));
    }
}

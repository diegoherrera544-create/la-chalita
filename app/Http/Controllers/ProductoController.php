<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();
        return view('admin.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagenes = [];

        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $ruta = $imagen->store('productos', 'public');
                $imagenes[] = $ruta;
            }
        }

        $producto = new Producto();
        $producto->nombre = $data['nombre'];
        $producto->descripcion = $data['descripcion'];
        $producto->precio = $data['precio'];
        $producto->imagenes = $imagenes;

        // ✅ Guardar estado del checkbox carrusel
        $producto->en_carrusel = $request->has('en_carrusel');

        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('admin.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        $imagenesActuales = $producto->imagenes ?? [];
        $imagenesAEliminar = []; // 👈 esta línea es nueva y correcta

        // Eliminar imágenes seleccionadas
        if ($request->filled('eliminar_imagenes')) {
            $imagenesAEliminar = $request->input('eliminar_imagenes');
            foreach ($imagenesAEliminar as $imagen) {
                if (in_array($imagen, $imagenesActuales)) {
                    Storage::disk('public')->delete($imagen);
                    $imagenesActuales = array_diff($imagenesActuales, [$imagen]);
                }
            }
        }

        // Agregar nuevas imágenes
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $imagen) {
                $path = $imagen->store('productos', 'public');
                $imagenesActuales[] = $path;
            }
        }

        $producto->imagenes = array_values($imagenesActuales); // Reindexar array
        $producto->en_carrusel = $request->has('en_carrusel');
        $producto->save();

        $mensaje = 'Producto actualizado correctamente.';

        if (!empty($imagenesAEliminar)) {
            $mensaje .= ' Se eliminaron ' . count($imagenesAEliminar) . ' imagen(es).';
        }

        return redirect()->route('productos.index')->with('success', $mensaje);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
{
    if (!empty($producto->imagenes)) {
        foreach ($producto->imagenes as $imagen) {
            Storage::disk('public')->delete($imagen);
        }
    }

    $producto->delete();

    return redirect()->route('productos.index')->with('success', 'Producto e imágenes eliminados correctamente.');
}

}

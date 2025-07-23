<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function index()
    {
        $mensajes = Mensaje::latest()->paginate(10);
        return view('admin.mensajes', compact('mensajes'));
    }

    public function destroy(Mensaje $mensaje)
    {
        $mensaje->delete();
        return redirect()->route('mensajes')->with('success', 'Mensaje eliminado correctamente.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Mensaje::create([
            'nombre' => $request->input('name'),
            'email' => $request->input('email'),
            'mensaje' => $request->input('message'),
        ]);

        return redirect()->route('contacto')->with('success', 'Mensaje enviado correctamente.');
    }
}

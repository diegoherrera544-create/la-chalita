<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio', 'imagenes'];

    // Decimos que el campo 'imagenes' es un array (para guardar JSON)
    protected $casts = [
        'imagenes' => 'array',
    ];
}

{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>

{{-- CSS con Vite --}}
@vite('resources/css/app.css')

{{-- Scripts JS personalizados --}}
<script type="module" src="{{ asset('js/productos.js') }}"></script>
<script type="module" src="{{ asset('js/productosRender.js') }}"></script>

<section class="bg-gradient-to-r from-indigo-50 via-white to-indigo-50 min-h-screen py-16">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
     <!-- TÍTULO + BOTÓN MENSAJES -->
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-4xl font-extrabold text-indigo-900 drop-shadow-md">
            🛍️ Listado de Productos
        </h1>
        
        <div class="flex gap-4 items-center">
            <a href="{{ route('mensajes') }}"
              class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-3 rounded-xl shadow-lg transition duration-300">
                Mensajes
            </a>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-5 py-3 rounded-xl shadow-lg transition duration-300">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>

    {{-- Mensaje de éxito --}}

    @if(session('success'))
      <div class="max-w-3xl mx-auto bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg mb-10 shadow-md text-center">
        {{ session('success') }}
      </div>
    @endif

    <div class="flex justify-end mb-6">
      <a href="{{ route('productos.create') }}"
         class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl shadow-lg transition duration-300">
        <i class="fas fa-plus-circle"></i> Crear nuevo producto
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full bg-white border border-gray-200 rounded-xl shadow-lg">
       <thead class="bg-indigo-100 text-indigo-800 text-sm uppercase font-semibold tracking-wide">
          <tr>
            <th class="px-4 py-3 text-left">Imagen</th>
            <th class="px-4 py-3 text-left">Nombre</th>
            <th class="px-4 py-3 text-left">Descripción</th>
            <th class="px-4 py-3 text-left">Precio</th>
            <th class="px-4 py-3 text-right">
              <div class="inline-block mr-10">Acciones</div>
            </th>
          </tr>
        </thead>
        <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
          @forelse($productos as $producto)
            <tr class="hover:bg-indigo-50 transition">
              <td class="px-4 py-3">
                @if(!empty($producto->imagenes))
                  <img src="{{ asset('storage/' . $producto->imagenes[0]) }}" alt="{{ $producto->nombre }}"
                       class="w-14 h-14 object-cover rounded-full border">
                @else
                  <img src="https://via.placeholder.com/100x100" alt="Imagen por defecto"
                       class="w-14 h-14 object-cover rounded-full border">
                @endif
              </td>
              <td class="px-4 py-3 font-bold">{{ $producto->nombre }}</td>
              <td class="px-4 py-3 max-w-xs truncate">{{ $producto->descripcion }}</td>
              <td class="px-4 py-3 text-indigo-600 font-semibold">${{ number_format($producto->precio, 2) }}</td>
              <td class="pr-2 py-3 text-right align-middle"> <!-- pr-2 reduce padding-right -->
                <div class="flex flex-row justify-end items-center gap-2">
                  <form action="{{ route('productos.edit', $producto) }}" method="GET">
                    <button type="submit"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-sm flex items-center gap-1">
                      <i class="fas fa-edit text-sm"></i> Editar
                    </button>
                  </form>

                  <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                        onsubmit="return confirm('¿Estás seguro de que quieres eliminar este producto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-sm flex items-center gap-1">
                      <i class="fas fa-trash"></i> Eliminar
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-gray-500 py-6">No hay productos cargados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>

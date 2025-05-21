{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>

{{-- CSS con Vite --}}
@vite('resources/css/app.css')

{{-- Scripts JS personalizados --}}
<script type="module" src="{{ asset('js/productos.js') }}"></script>
<script type="module" src="{{ asset('js/productosRender.js') }}"></script>

<section class="bg-gradient-to-r from-indigo-50 via-white to-indigo-50 min-h-screen py-16">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-extrabold text-indigo-900 mb-12 text-center drop-shadow-md">
      🛠️ Editar Producto
    </h1>

    @if ($errors->any())
      <div class="bg-red-100 text-red-700 p-4 mb-6 rounded shadow-md">
        <strong>¡Ups!</strong> Hay algunos errores con tus datos.
        <ul class="list-disc pl-6 mt-2">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="overflow-x-auto bg-white p-8 rounded-2xl shadow-lg">
      <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <table class="table-auto w-full text-sm text-left text-gray-700">
          <tbody>
            <tr class="border-b">
              <td class="py-3 pr-4 font-semibold w-1/4">Nombre:</td>
              <td class="py-3">
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" required
                  class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 transition">
              </td>
            </tr>

            <tr class="border-b">
              <td class="py-3 pr-4 font-semibold">Descripción:</td>
              <td class="py-3">
                <textarea name="descripcion" id="descripcion" rows="4" required
                  class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 transition resize-none">{{ old('descripcion', $producto->descripcion) }}</textarea>
              </td>
            </tr>

            <tr class="border-b">
              <td class="py-3 pr-4 font-semibold">Precio:</td>
              <td class="py-3">
                <input type="number" name="precio" id="precio" step="0.01" min="0" value="{{ old('precio', $producto->precio) }}" required
                  class="w-full rounded-md border border-gray-300 px-4 py-2 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 transition">
              </td>
            </tr>

            <tr class="border-b">
              <td class="py-3 pr-4 font-semibold">Imágenes (nuevas):</td>
              <td class="py-3">
                <input type="file" name="imagenes[]" id="imagenes" multiple accept="image/*"
                  class="w-full text-gray-700 file:px-4 file:py-2 file:border-0 file:rounded-full file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200 transition cursor-pointer">
              </td>
            </tr>

            @if ($producto->imagenes)
              <tr class="border-b">
                <td class="py-3 pr-4 font-semibold align-top">Imágenes actuales:</td>
                <td class="py-3">
                  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($producto->imagenes as $imagen)
                      <div class="border p-2 rounded-md shadow-sm">
                        <img src="{{ asset('storage/' . $imagen) }}" class="w-full h-32 object-cover rounded mb-2">
                        <label class="text-sm flex items-center gap-2">
                          <input type="checkbox" name="eliminar_imagenes[]" value="{{ $imagen }}">
                          Eliminar
                        </label>
                      </div>
                    @endforeach
                  </div>
                </td>
              </tr>
            @endif

            <tr>
              <td></td>
              <td class="py-6">
                <div class="flex flex-wrap gap-4 items-center">
                  <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-xl shadow-md transition">
                    Actualizar Producto
                  </button>
                  <a href="{{ route('productos.index') }}" class="text-gray-600 hover:underline text-sm">
                    Cancelar
                  </a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </form>

      {{-- Botón para eliminar el producto --}}
      <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="mt-8"
            onsubmit="return confirm('¿Estás segura/o de que querés eliminar este producto? Esta acción no se puede deshacer.');">
        @csrf
        @method('DELETE')
        <button type="submit"
          class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-xl shadow transition">
          🗑️ Eliminar producto
        </button>
      </form>
    </div>
  </div>
</section>

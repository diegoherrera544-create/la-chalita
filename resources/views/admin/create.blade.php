{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>

{{-- CSS con Vite --}}
@vite('resources/css/app.css')

{{-- Scripts JS personalizados --}}
<script type="module" src="{{ asset('js/productos.js') }}"></script>
<script type="module" src="{{ asset('js/productosRender.js') }}"></script>

<section class="bg-gradient-to-r from-indigo-50 via-white to-indigo-50 min-h-screen py-16">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <h1 class="text-4xl font-extrabold text-indigo-900 mb-12 text-center drop-shadow-md">
      ✨ Crear Nuevo Producto
    </h1>

    <div class="overflow-x-auto bg-white p-8 rounded-2xl shadow-lg">
      <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table class="table-auto w-full text-left text-sm text-gray-700">
          <tbody>
            <tr class="border-b">
              <td class="font-semibold py-3 pr-4 w-1/4">Nombre:</td>
              <td class="py-3">
                <input
                  type="text"
                  name="nombre"
                  id="nombre"
                  required
                  class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 transition"
                  placeholder="Ingrese el nombre del producto"
                >
              </td>
            </tr>

            <tr class="border-b">
              <td class="font-semibold py-3 pr-4">Descripción:</td>
              <td class="py-3">
                <textarea
                  name="descripcion"
                  id="descripcion"
                  rows="4"
                  class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 transition resize-none"
                  placeholder="Ingrese una descripción breve"
                ></textarea>
              </td>
            </tr>

            <tr class="border-b">
              <td class="font-semibold py-3 pr-4">Precio:</td>
              <td class="py-3">
                <input
                  type="number"
                  name="precio"
                  id="precio"
                  step="0.01"
                  required
                  min="0"
                  class="w-full rounded-md border border-gray-300 px-4 py-2 text-gray-900 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-300 transition"
                  placeholder="0.00"
                >
              </td>
            </tr>

            <tr class="border-b">
              <td class="font-semibold py-3 pr-4">Imágenes:</td>
              <td class="py-3">
                <input
                  type="file"
                  name="imagenes[]"
                  id="imagenes"
                  multiple
                  accept="image/*"
                  class="w-full text-gray-700 file:px-4 file:py-2 file:border-0 file:rounded-full file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200 transition cursor-pointer"
                >
              </td>
            </tr>

            <tr>
              <td></td>
              <td class="py-6">
                <button
                  type="submit"
                  class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl shadow-md transition duration-300"
                >
                  Guardar
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</section>

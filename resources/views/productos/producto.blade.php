<!-- TÍTULO -->
<div class="text-center p-10">
    <h1 class="font-bold text-4xl mb-4">¡Nuestros trabajos!</h1>
    <h2 class="text-3xl text-gray-700">La Chalita - Exclusividad en Cada Producto</h2>
</div>

<!-- GALERÍA DE PRODUCTOS -->
<section id="Projects"
    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 px-4 mb-10 max-w-7xl mx-auto">

    {{-- 🔽 Solo productos que NO están en el carrusel --}}
    @forelse ($productos->where('en_carrusel', false) as $producto)
        <div class="bg-white shadow-lg rounded-2xl overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-2xl">
            <a href="#" onclick="mostrarProducto(
                '{{ asset('storage/' . ($producto->imagenes[0] ?? 'imagen-no-disponible.jpg')) }}',
                `{{ $producto->nombre }}`,
                `{{ $producto->descripcion ?? 'Sin descripción disponible' }}`,
                `{{ number_format($producto->precio, 2) }}`
            ); return false;">

                <!-- Imagen -->
                <div class="w-full h-64 sm:h-72 md:h-80 bg-gray-100">
                    @if ($producto->imagenes && count($producto->imagenes) > 0)
                        <img src="{{ asset('storage/' . $producto->imagenes[0]) }}"
                            alt="{{ $producto->nombre }}"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-110" />
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">
                            Imagen no disponible
                        </div>
                    @endif
                </div>

                <!-- Información -->
                <div class="px-4 py-4">
                    <p class="text-lg font-bold text-black truncate capitalize">
                        {{ $producto->nombre }}
                    </p>
                    <div class="flex items-center mt-2">
                        <p class="text-lg font-semibold text-green-600">
                            ${{ number_format($producto->precio, 2) }}
                        </p>
                        @if ($producto->precio_original)
                            <del class="ml-2 text-sm text-gray-500">
                                ${{ number_format($producto->precio_original, 2) }}
                            </del>
                        @endif

                        <div class="ml-auto text-gray-600 hover:text-black transition">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @empty
        <p class="col-span-full text-center text-gray-500">No hay productos en oferta por el momento.</p>
    @endforelse
</section>


<!-- MODAL DETALLE DEL PRODUCTO -->
<div id="modalProducto" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center px-4">
    <div onclick="cerrarModal()" class="absolute inset-0 cursor-pointer"></div>
    <div class="bg-white flex flex-col lg:flex-row max-w-4xl w-full relative z-10 rounded-xl overflow-hidden shadow-2xl">

        <!-- Imagen -->
        <div class="lg:w-1/2 flex items-center justify-center bg-gray-100">
            <img id="imagenProducto" src="" alt="Producto"
                class="max-h-[70vh] w-full sm:w-11/12 md:w-4/5 lg:w-[90%] object-contain p-4 rounded-xl transition-all duration-300" />
        </div>

        <!-- Información -->
        <div class="py-6 px-4 sm:px-6 md:px-8 lg:px-10 lg:w-1/2 max-h-[90vh] overflow-y-auto">
            <h2 id="nombreProducto" class="text-2xl md:text-3xl font-bold text-gray-800"></h2>
            <p id="descripcionProducto" class="mt-4 text-gray-600 leading-relaxed text-sm md:text-base"></p>
            <p id="precioProducto" class="mt-6 text-xl md:text-2xl font-semibold text-green-600"></p>

            <div class="mt-8">
                <button onclick="cerrarModal()"
                    class="bg-gray-900 text-white px-5 py-3 font-semibold rounded hover:bg-gray-700 transition w-full sm:w-auto">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- SCRIPT -->
<script>
    function mostrarProducto(imagenUrl, nombre, descripcion, precio) {
        document.getElementById('imagenProducto').src = imagenUrl;
        document.getElementById('nombreProducto').textContent = nombre;
        document.getElementById('descripcionProducto').textContent = descripcion;
        document.getElementById('precioProducto').textContent = '$' + precio;
        document.getElementById('modalProducto').classList.remove('hidden');
    }

    function cerrarModal() {
        document.getElementById('modalProducto').classList.add('hidden');
    }
</script>


{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>

{{-- CSS con Vite --}}
@vite('resources/css/app.css')

{{-- Scripts JS personalizados --}}
<script type="module" src="{{ asset('js/productos.js') }}"></script>
<script type="module" src="{{ asset('js/productosRender.js') }}"></script>

<section class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4">

        <!-- Botón Volver al inicio de productos -->
        <div class="mb-6">
            <a href="{{ route('productos.index') }}"
               class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2 rounded-lg shadow transition duration-300">
                ← Volver a Productos
            </a>
        </div>

        <!-- Título -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-indigo-800">📨 Mensajes recibidos</h1>
        </div>

        <!-- Mensaje de éxito -->
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de mensajes -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto text-sm text-gray-700">
                <thead class="bg-indigo-100 text-indigo-800 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">Nombre</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Mensaje</th>
                        <th class="px-4 py-3 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($mensajes as $mensaje)
                        <tr class="hover:bg-indigo-50">
                            <td class="px-4 py-3 font-medium">{{ $mensaje->nombre }}</td>
                            <td class="px-4 py-3">{{ $mensaje->email }}</td>
                            <td class="px-4 py-3 max-w-xs">
                                <!-- Mensaje truncado con clic para ver más -->
                                <button type="button"
                                        onclick="openModal('{{ addslashes($mensaje->nombre) }}', '{{ addslashes($mensaje->mensaje) }}')"
                                        class="text-indigo-700 hover:text-indigo-900 underline decoration-dotted font-medium text-left truncate block w-full text-start">
                                    {{ Str::limit($mensaje->mensaje, 100) }}
                                </button>
                            </td>
                            <td class="px-4 py-3 text-right">
                                <form action="{{ route('mensajes.destroy', $mensaje) }}" method="POST" onsubmit="return confirm('¿Eliminar este mensaje?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-6 text-gray-500">No hay mensajes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $mensajes->links() }}
        </div>

    </div>
</section>

<!-- Modal para ver mensaje completo -->
<div id="messageModal" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-xl shadow-xl max-w-lg w-full mx-4 max-h-[90vh] flex flex-col">
        <!-- Encabezado del modal -->
        <div class="p-6 border-b border-gray-200">
            <h3 id="modalTitle" class="text-lg font-semibold text-gray-800"></h3>
        </div>
        <!-- Cuerpo del modal -->
        <div class="p-6 overflow-y-auto flex-1">
            <p id="modalMessage" class="text-gray-700 leading-relaxed whitespace-pre-wrap"></p>
        </div>
        <!-- Pie del modal -->
        <div class="p-6 border-t border-gray-200 flex justify-end">
            <button onclick="closeModal()"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg text-sm font-medium transition">
                Cerrar
            </button>
        </div>
    </div>
</div>

<!-- Script para manejar el modal -->
<script>
    function openModal(nombre, mensaje) {
        document.getElementById('modalTitle').textContent = 'Mensaje de: ' + nombre;
        document.getElementById('modalMessage').textContent = mensaje;
        document.getElementById('messageModal').classList.remove('hidden');
        document.body.classList.add('overflow-hidden'); // Evita scroll de fondo
    }

    function closeModal() {
        document.getElementById('messageModal').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    // Cerrar con tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });
</script>
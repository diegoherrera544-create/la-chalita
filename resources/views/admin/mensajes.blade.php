 {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- CSS con Vite --}}
    @vite('resources/css/app.css')
    
    {{-- Scripts JS personalizados --}}
    <script type="module" src="{{ asset('js/productos.js') }}"></script>
    <script type="module" src="{{ asset('js/productosRender.js') }}"></script>
    
<section class="bg-gray-100 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4">

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-indigo-800">📨 Mensajes recibidos</h1>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg shadow">
                {{ session('success') }}
            </div>
        @endif

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
                            <td class="px-4 py-3 max-w-xs truncate">{{ $mensaje->mensaje }}</td>
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

        <div class="mt-6">
            {{ $mensajes->links() }}
        </div>

    </div>
</section>


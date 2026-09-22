<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    {{-- Fundamental para celulares --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>La Chalita - Productos</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- CSS con Vite --}}
    @vite('resources/css/app.css')

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Scripts personalizados --}}
    <script type="module" src="{{ asset('js/productos.js') }}"></script>
    <script type="module" src="{{ asset('js/productosRender.js') }}"></script>
</head>

<body class="min-h-screen bg-gradient-to-r from-indigo-50 via-white to-indigo-50">

    <section class="min-h-screen py-6 sm:py-10 lg:py-14">

        <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">


            {{-- ===================================== --}}
            {{--        ENCABEZADO Y BOTONES           --}}
            {{-- ===================================== --}}

            <div class="mb-7">

                <h1 class="mb-6 text-center
                           text-3xl font-extrabold
                           text-indigo-900
                           drop-shadow-sm
                           sm:text-4xl">

                    🛍️ Listado de Productos

                </h1>


                {{-- MENSAJES Y CERRAR SESIÓN --}}

                <div class="grid grid-cols-2 gap-3 sm:flex sm:justify-center">

                    <a href="{{ route('mensajes') }}"
                       class="inline-flex min-h-[48px]
                              items-center justify-center gap-2
                              rounded-xl
                              bg-blue-600
                              px-4 py-3
                              text-base font-semibold text-white
                              shadow-md
                              transition duration-300
                              hover:bg-blue-700">

                        <i class="fas fa-envelope"></i>

                        <span>Mensajes</span>

                    </a>


                    <form id="logout-form"
                          method="POST"
                          action="{{ route('admin.logout') }}"
                          class="hidden">

                        @csrf

                    </form>


                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"

                       class="inline-flex min-h-[48px]
                              items-center justify-center gap-2
                              rounded-xl
                              bg-red-600
                              px-4 py-3
                              text-base font-semibold text-white
                              shadow-md
                              transition duration-300
                              hover:bg-red-700">

                        <i class="fas fa-sign-out-alt"></i>

                        <span>Cerrar sesión</span>

                    </a>

                </div>

            </div>


            {{-- ===================================== --}}
            {{--          MENSAJE DE ÉXITO             --}}
            {{-- ===================================== --}}

            @if(session('success'))

                <div class="mx-auto mb-6 w-full max-w-3xl
                            rounded-xl
                            border border-green-300
                            bg-green-100
                            px-5 py-4
                            text-center
                            text-base font-medium text-green-800
                            shadow-md">

                    {{ session('success') }}

                </div>

            @endif


            {{-- ===================================== --}}
            {{--         CREAR NUEVO PRODUCTO          --}}
            {{-- ===================================== --}}

            <div class="mb-7">

                <a href="{{ route('productos.create') }}"
                   class="inline-flex min-h-[52px] w-full
                          items-center justify-center gap-3
                          rounded-xl
                          bg-indigo-600
                          px-6 py-3
                          text-lg font-semibold text-white
                          shadow-lg
                          transition duration-300
                          hover:bg-indigo-700
                          sm:mx-auto sm:flex sm:max-w-sm">

                    <i class="fas fa-plus-circle"></i>

                    <span>Crear nuevo producto</span>

                </a>

            </div>


            {{-- ================================================= --}}
            {{--           VERSIÓN CELULAR Y TABLET                 --}}
            {{-- ================================================= --}}

            <div class="grid grid-cols-1 gap-6 lg:hidden">

                @forelse($productos as $producto)

                    <article class="overflow-hidden
                                    rounded-2xl
                                    border border-gray-200
                                    bg-white
                                    shadow-lg
                                    transition duration-300
                                    hover:-translate-y-1
                                    hover:shadow-xl">


                        {{-- IMAGEN DEL PRODUCTO --}}

                        <div class="flex w-full items-center justify-center
                                    bg-gray-100 p-3">

                            @if(!empty($producto->imagenes))

                                <img
                                    src="{{ asset('storage/' . $producto->imagenes[0]) }}"
                                    alt="{{ $producto->nombre }}"

                                    class="h-64 w-full
                                           rounded-xl
                                           object-contain
                                           sm:h-72">

                            @else

                                <div class="flex h-64 w-full
                                            items-center justify-center
                                            rounded-xl
                                            bg-gray-200
                                            text-lg text-gray-500">

                                    <i class="fas fa-image mr-2"></i>

                                    Sin imagen

                                </div>

                            @endif

                        </div>


                        {{-- INFORMACIÓN DEL PRODUCTO --}}

                        <div class="p-5 sm:p-6">


                            {{-- NOMBRE --}}

                            <h2 class="mb-3
                                       break-words
                                       text-2xl font-bold
                                       text-gray-900">

                                {{ $producto->nombre }}

                            </h2>


                            {{-- DESCRIPCIÓN --}}

                            <p class="mb-5
                                      break-words
                                      text-base leading-7
                                      text-gray-600">

                                {{ $producto->descripcion }}

                            </p>


                            {{-- PRECIO --}}

                            <div class="mb-6 flex items-center justify-between
                                        border-y border-gray-100
                                        py-4">

                                <span class="text-base font-medium text-gray-500">
                                    Precio
                                </span>

                                <span class="text-2xl font-bold text-indigo-600">
                                    ${{ number_format($producto->precio, 2, ',', '.') }}
                                </span>

                            </div>


                            {{-- BOTONES DE ACCIÓN --}}

                            <div class="grid grid-cols-2 gap-3">


                                {{-- EDITAR --}}

                                <form action="{{ route('productos.edit', $producto) }}"
                                      method="GET"
                                      class="w-full">

                                    <button
                                        type="submit"
                                        class="inline-flex min-h-[50px] w-full
                                               items-center justify-center gap-2
                                               rounded-xl
                                               bg-yellow-500
                                               px-4 py-3
                                               text-base font-semibold text-white
                                               shadow-md
                                               transition duration-300
                                               hover:bg-yellow-600">

                                        <i class="fas fa-edit"></i>

                                        Editar

                                    </button>

                                </form>


                                {{-- ELIMINAR --}}

                                <form action="{{ route('productos.destroy', $producto) }}"
                                      method="POST"
                                      class="w-full"
                                      onsubmit="return confirm('¿Estás seguro de que querés eliminar este producto?');">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex min-h-[50px] w-full
                                               items-center justify-center gap-2
                                               rounded-xl
                                               bg-red-600
                                               px-4 py-3
                                               text-base font-semibold text-white
                                               shadow-md
                                               transition duration-300
                                               hover:bg-red-700">

                                        <i class="fas fa-trash"></i>

                                        Eliminar

                                    </button>

                                </form>

                            </div>

                        </div>

                    </article>

                @empty

                    <div class="rounded-2xl
                                border border-gray-200
                                bg-white
                                p-10
                                text-center
                                text-lg text-gray-500
                                shadow-md">

                        <i class="fas fa-box-open mb-4 block text-4xl text-gray-400"></i>

                        No hay productos cargados.

                    </div>

                @endforelse

            </div>


            {{-- ================================================= --}}
            {{--               VERSIÓN ESCRITORIO                  --}}
            {{-- ================================================= --}}

            <div class="hidden lg:block">

                <div class="overflow-x-auto
                            rounded-2xl
                            border border-gray-200
                            bg-white
                            shadow-lg">

                    <table class="w-full min-w-[900px] text-left">


                        {{-- CABECERA --}}

                        <thead class="bg-indigo-100
                                      text-sm font-semibold
                                      uppercase tracking-wide
                                      text-indigo-900">

                            <tr>

                                <th class="px-6 py-4">
                                    Imagen
                                </th>

                                <th class="px-6 py-4">
                                    Nombre
                                </th>

                                <th class="px-6 py-4">
                                    Descripción
                                </th>

                                <th class="px-6 py-4">
                                    Precio
                                </th>

                                <th class="px-6 py-4 text-right">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        {{-- PRODUCTOS --}}

                        <tbody class="divide-y divide-gray-100
                                      text-base text-gray-700">

                            @forelse($productos as $producto)

                                <tr class="transition hover:bg-indigo-50">


                                    {{-- IMAGEN --}}

                                    <td class="px-6 py-4">

                                        @if(!empty($producto->imagenes))

                                            <img
                                                src="{{ asset('storage/' . $producto->imagenes[0]) }}"
                                                alt="{{ $producto->nombre }}"

                                                class="h-20 w-20
                                                       rounded-xl
                                                       border
                                                       object-cover
                                                       shadow-sm">

                                        @else

                                            <div class="flex h-20 w-20
                                                        items-center justify-center
                                                        rounded-xl
                                                        border
                                                        bg-gray-100
                                                        text-center
                                                        text-xs text-gray-400">

                                                Sin imagen

                                            </div>

                                        @endif

                                    </td>


                                    {{-- NOMBRE --}}

                                    <td class="max-w-[200px]
                                               break-words
                                               px-6 py-4
                                               font-bold
                                               text-gray-900">

                                        {{ $producto->nombre }}

                                    </td>


                                    {{-- DESCRIPCIÓN --}}

                                    <td class="max-w-sm px-6 py-4">

                                        <p class="line-clamp-3 leading-6">
                                            {{ $producto->descripcion }}
                                        </p>

                                    </td>


                                    {{-- PRECIO --}}

                                    <td class="whitespace-nowrap
                                               px-6 py-4
                                               text-lg font-bold
                                               text-indigo-600">

                                        ${{ number_format($producto->precio, 2, ',', '.') }}

                                    </td>


                                    {{-- ACCIONES --}}

                                    <td class="px-6 py-4">

                                        <div class="flex items-center justify-end gap-3">


                                            {{-- EDITAR --}}

                                            <form action="{{ route('productos.edit', $producto) }}"
                                                  method="GET">

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center justify-center gap-2
                                                           rounded-xl
                                                           bg-yellow-500
                                                           px-4 py-2.5
                                                           text-sm font-semibold text-white
                                                           shadow-sm
                                                           transition
                                                           hover:bg-yellow-600">

                                                    <i class="fas fa-edit"></i>

                                                    Editar

                                                </button>

                                            </form>


                                            {{-- ELIMINAR --}}

                                            <form action="{{ route('productos.destroy', $producto) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('¿Estás seguro de que querés eliminar este producto?');">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="inline-flex items-center justify-center gap-2
                                                           rounded-xl
                                                           bg-red-600
                                                           px-4 py-2.5
                                                           text-sm font-semibold text-white
                                                           shadow-sm
                                                           transition
                                                           hover:bg-red-700">

                                                    <i class="fas fa-trash"></i>

                                                    Eliminar

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="5"
                                        class="py-12 text-center
                                               text-lg text-gray-500">

                                        <i class="fas fa-box-open mb-3 block text-4xl text-gray-400"></i>

                                        No hay productos cargados.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>

</body>

</html>
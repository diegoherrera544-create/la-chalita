<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    {{-- Fundamental para celulares --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>La Chalita - Mensajes recibidos</title>

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
            {{--             BOTÓN VOLVER             --}}
            {{-- ===================================== --}}

            <div class="mb-6">

                <a
                    href="{{ route('productos.index') }}"

                    class="inline-flex min-h-[50px] w-full
                           items-center justify-center gap-2
                           rounded-xl
                           bg-indigo-600
                           px-5 py-3
                           text-base font-semibold text-white
                           shadow-md
                           transition duration-300
                           hover:bg-indigo-700
                           focus:outline-none
                           focus:ring-4
                           focus:ring-indigo-300
                           sm:w-auto">

                    <i class="fas fa-arrow-left"></i>

                    Volver a Productos

                </a>

            </div>


            {{-- ===================================== --}}
            {{--                 TÍTULO                --}}
            {{-- ===================================== --}}

            <div class="mb-7 text-center sm:mb-9">

                <h1 class="text-3xl font-extrabold
                           text-indigo-900
                           drop-shadow-sm
                           sm:text-4xl">

                    📨 Mensajes recibidos

                </h1>

                <p class="mt-3 text-base text-gray-600 sm:text-lg">
                    Consultas enviadas desde el formulario de contacto.
                </p>

            </div>


            {{-- ===================================== --}}
            {{--          MENSAJE DE ÉXITO            --}}
            {{-- ===================================== --}}

            @if(session('success'))

                <div class="mx-auto mb-7 w-full max-w-3xl
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


            {{-- ================================================= --}}
            {{--           VERSIÓN CELULAR Y TABLET                 --}}
            {{-- ================================================= --}}

            <div class="grid grid-cols-1 gap-6 lg:hidden">

                @forelse($mensajes as $mensaje)

                    <article class="overflow-hidden
                                    rounded-2xl
                                    border border-gray-200
                                    bg-white
                                    shadow-lg">


                        {{-- ENCABEZADO DE LA TARJETA --}}

                        <div class="border-b border-gray-100
                                    bg-indigo-50
                                    px-5 py-4">

                            <div class="flex items-center gap-3">

                                <div class="flex h-12 w-12
                                            shrink-0
                                            items-center justify-center
                                            rounded-full
                                            bg-indigo-600
                                            text-xl font-bold text-white">

                                    {{ strtoupper(mb_substr($mensaje->nombre, 0, 1)) }}

                                </div>

                                <div class="min-w-0">

                                    <p class="text-sm font-medium text-gray-500">
                                        Mensaje de
                                    </p>

                                    <h2 class="break-words
                                               text-xl font-bold
                                               text-gray-900">

                                        {{ $mensaje->nombre }}

                                    </h2>

                                </div>

                            </div>

                        </div>


                        {{-- INFORMACIÓN DEL MENSAJE --}}

                        <div class="p-5">


                            {{-- EMAIL --}}

                            <div class="mb-5">

                                <p class="mb-2
                                          text-sm font-bold
                                          uppercase tracking-wide
                                          text-gray-500">

                                    Email

                                </p>

                                <a
                                    href="mailto:{{ $mensaje->email }}"

                                    class="flex min-h-[48px]
                                           items-center gap-3
                                           break-all
                                           rounded-xl
                                           bg-gray-50
                                           px-4 py-3
                                           text-base font-medium
                                           text-indigo-700
                                           transition
                                           hover:bg-indigo-50
                                           hover:text-indigo-900">

                                    <i class="fas fa-envelope shrink-0"></i>

                                    <span>{{ $mensaje->email }}</span>

                                </a>

                            </div>


                            {{-- MENSAJE --}}

                            <div class="mb-6">

                                <p class="mb-2
                                          text-sm font-bold
                                          uppercase tracking-wide
                                          text-gray-500">

                                    Mensaje

                                </p>

                                <button
                                    type="button"

                                    onclick="openModal(
                                        @js($mensaje->nombre),
                                        @js($mensaje->mensaje)
                                    )"

                                    class="w-full
                                           rounded-xl
                                           border border-indigo-100
                                           bg-indigo-50
                                           p-4
                                           text-left
                                           transition duration-200
                                           hover:border-indigo-200
                                           hover:bg-indigo-100">

                                    <span class="block
                                                 break-words
                                                 text-base leading-7
                                                 text-gray-700">

                                        {{ Str::limit($mensaje->mensaje, 150) }}

                                    </span>

                                    <span class="mt-3
                                                 inline-flex
                                                 items-center gap-2
                                                 text-base font-bold
                                                 text-indigo-700">

                                        <i class="fas fa-expand-alt"></i>

                                        Ver mensaje completo

                                    </span>

                                </button>

                            </div>


                            {{-- BOTONES --}}

                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">


                                {{-- RESPONDER --}}

                                <a
                                    href="mailto:{{ $mensaje->email }}?subject=Respuesta de La Chalita"

                                    class="inline-flex min-h-[50px] w-full
                                           items-center justify-center gap-2
                                           rounded-xl
                                           bg-green-600
                                           px-4 py-3
                                           text-base font-semibold text-white
                                           shadow-sm
                                           transition
                                           hover:bg-green-700">

                                    <i class="fas fa-reply"></i>

                                    Responder

                                </a>


                                {{-- ELIMINAR --}}

                                <form
                                    action="{{ route('mensajes.destroy', $mensaje) }}"
                                    method="POST"
                                    class="w-full"

                                    onsubmit="return confirm('¿Estás seguro de que querés eliminar este mensaje?');">

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
                                               shadow-sm
                                               transition
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
                                shadow-md">

                        <i class="fas fa-inbox mb-4
                                  block text-5xl
                                  text-gray-300">
                        </i>

                        <h2 class="text-xl font-bold text-gray-700">
                            No hay mensajes
                        </h2>

                        <p class="mt-2 text-base text-gray-500">
                            Todavía no se recibieron consultas.
                        </p>

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

                    <table class="w-full min-w-[950px] text-left">


                        {{-- CABECERA --}}

                        <thead class="bg-indigo-100
                                      text-sm font-semibold
                                      uppercase tracking-wide
                                      text-indigo-900">

                            <tr>

                                <th class="px-6 py-4">
                                    Nombre
                                </th>

                                <th class="px-6 py-4">
                                    Email
                                </th>

                                <th class="px-6 py-4">
                                    Mensaje
                                </th>

                                <th class="px-6 py-4 text-right">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        {{-- MENSAJES --}}

                        <tbody class="divide-y divide-gray-100
                                      text-base text-gray-700">

                            @forelse($mensajes as $mensaje)

                                <tr class="transition hover:bg-indigo-50">


                                    {{-- NOMBRE --}}

                                    <td class="max-w-[200px]
                                               break-words
                                               px-6 py-5
                                               font-bold
                                               text-gray-900">

                                        {{ $mensaje->nombre }}

                                    </td>


                                    {{-- EMAIL --}}

                                    <td class="max-w-[250px]
                                               break-all
                                               px-6 py-5">

                                        <a
                                            href="mailto:{{ $mensaje->email }}"
                                            class="font-medium
                                                   text-indigo-700
                                                   hover:text-indigo-900
                                                   hover:underline">

                                            {{ $mensaje->email }}

                                        </a>

                                    </td>


                                    {{-- MENSAJE --}}

                                    <td class="max-w-md px-6 py-5">

                                        <button
                                            type="button"

                                            onclick="openModal(
                                                @js($mensaje->nombre),
                                                @js($mensaje->mensaje)
                                            )"

                                            class="block w-full
                                                   truncate
                                                   text-left
                                                   font-medium
                                                   text-indigo-700
                                                   underline
                                                   decoration-dotted
                                                   hover:text-indigo-900">

                                            {{ Str::limit($mensaje->mensaje, 110) }}

                                        </button>

                                    </td>


                                    {{-- ACCIONES --}}

                                    <td class="px-6 py-5">

                                        <div class="flex items-center
                                                    justify-end gap-3">

                                            <a
                                                href="mailto:{{ $mensaje->email }}?subject=Respuesta de La Chalita"

                                                class="inline-flex
                                                       items-center justify-center gap-2
                                                       rounded-xl
                                                       bg-green-600
                                                       px-4 py-2.5
                                                       text-sm font-semibold text-white
                                                       shadow-sm
                                                       transition
                                                       hover:bg-green-700">

                                                <i class="fas fa-reply"></i>

                                                Responder

                                            </a>


                                            <form
                                                action="{{ route('mensajes.destroy', $mensaje) }}"
                                                method="POST"

                                                onsubmit="return confirm('¿Estás seguro de que querés eliminar este mensaje?');">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"

                                                    class="inline-flex
                                                           items-center justify-center gap-2
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

                                    <td colspan="4"
                                        class="py-12 text-center
                                               text-lg text-gray-500">

                                        <i class="fas fa-inbox mb-3
                                                  block text-4xl
                                                  text-gray-300">
                                        </i>

                                        No hay mensajes registrados.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- ===================================== --}}
            {{--              PAGINACIÓN               --}}
            {{-- ===================================== --}}

            @if($mensajes->hasPages())

                <div class="mt-8 overflow-x-auto pb-2">

                    {{ $mensajes->links() }}

                </div>

            @endif

        </div>

    </section>


    {{-- ================================================= --}}
    {{--               MODAL MENSAJE COMPLETO              --}}
    {{-- ================================================= --}}

    <div
        id="messageModal"
        role="dialog"
        aria-modal="true"
        aria-labelledby="modalTitle"

        class="fixed inset-0
               z-50
               hidden
               items-center justify-center
               bg-black/60
               p-4
               backdrop-blur-sm">

        <div class="flex max-h-[90vh] w-full
                    max-w-xl flex-col
                    overflow-hidden
                    rounded-2xl
                    bg-white
                    shadow-2xl">


            {{-- ENCABEZADO DEL MODAL --}}

            <div class="flex items-start justify-between
                        gap-4
                        border-b border-gray-200
                        bg-indigo-50
                        p-5">

                <div class="min-w-0">

                    <p class="mb-1
                              text-sm font-semibold
                              uppercase tracking-wide
                              text-indigo-600">

                        Mensaje recibido

                    </p>

                    <h3 id="modalTitle"
                        class="break-words
                               text-xl font-bold
                               text-gray-900">
                    </h3>

                </div>


                <button
                    type="button"
                    onclick="closeModal()"
                    aria-label="Cerrar mensaje"

                    class="flex h-11 w-11
                           shrink-0
                           items-center justify-center
                           rounded-full
                           text-3xl leading-none
                           text-gray-500
                           transition
                           hover:bg-gray-200
                           hover:text-gray-800">

                    ×

                </button>

            </div>


            {{-- CUERPO DEL MODAL --}}

            <div class="flex-1 overflow-y-auto p-5 sm:p-6">

                <p id="modalMessage"
                   class="whitespace-pre-wrap
                          break-words
                          text-base leading-7
                          text-gray-700">
                </p>

            </div>


            {{-- PIE DEL MODAL --}}

            <div class="border-t border-gray-200
                        bg-gray-50
                        p-4 sm:p-5">

                <button
                    type="button"
                    onclick="closeModal()"

                    class="inline-flex min-h-[50px] w-full
                           items-center justify-center
                           rounded-xl
                           bg-gray-700
                           px-6 py-3
                           text-base font-semibold text-white
                           transition
                           hover:bg-gray-800
                           sm:ml-auto sm:flex sm:w-auto">

                    Cerrar

                </button>

            </div>

        </div>

    </div>


    {{-- ================================================= --}}
    {{--                   SCRIPT MODAL                    --}}
    {{-- ================================================= --}}

    <script>

        const messageModal = document.getElementById('messageModal');
        const modalTitle = document.getElementById('modalTitle');
        const modalMessage = document.getElementById('modalMessage');


        function openModal(nombre, mensaje) {

            modalTitle.textContent = 'Mensaje de: ' + nombre;
            modalMessage.textContent = mensaje;

            messageModal.classList.remove('hidden');
            messageModal.classList.add('flex');

            document.body.classList.add('overflow-hidden');
        }


        function closeModal() {

            messageModal.classList.add('hidden');
            messageModal.classList.remove('flex');

            document.body.classList.remove('overflow-hidden');
        }


        document.addEventListener('keydown', function (event) {

            if (event.key === 'Escape' &&
                !messageModal.classList.contains('hidden')) {

                closeModal();
            }

        });


        messageModal.addEventListener('click', function (event) {

            if (event.target === messageModal) {

                closeModal();
            }

        });

    </script>

</body>

</html>
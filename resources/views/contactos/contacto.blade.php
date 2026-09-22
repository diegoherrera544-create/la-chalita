<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    {{-- Fundamental para celulares --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>La Chalita - Contacto</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- CSS con Vite --}}
    @vite('resources/css/app.css')

    {{-- Scripts personalizados --}}
    <script type="module" src="{{ asset('js/productos.js') }}"></script>
    <script type="module" src="{{ asset('js/productosRender.js') }}"></script>
</head>

<body class="min-h-screen bg-gray-900">

    <section class="relative min-h-screen bg-gray-900 text-gray-300">

        <div class="mx-auto w-full max-w-4xl px-5 py-7 sm:px-8 sm:py-12 lg:py-16">


            {{-- ===================================== --}}
            {{--               ENCABEZADO              --}}
            {{-- ===================================== --}}

            <div id="inicio"
                 class="mx-auto mb-7 max-w-2xl text-center sm:mb-10">

                <h1 class="mb-3 text-3xl font-bold text-white sm:text-4xl">
                    Contáctenos
                </h1>

                <p class="text-base leading-7 text-gray-300 sm:text-lg sm:leading-8">
                    ¡No dudes en contactarnos! Si tenés alguna pregunta,
                    comentario o una propuesta de colaboración, nos encantaría
                    saber de vos.
                </p>

            </div>


            {{-- ===================================== --}}
            {{--            MENSAJE DE ÉXITO           --}}
            {{-- ===================================== --}}

            @if(session('success'))

                <div class="mx-auto mb-7 max-w-2xl
                            rounded-xl border border-green-400
                            bg-green-100 px-5 py-4
                            text-center text-green-900 shadow-lg">

                    <p class="mb-4 text-base font-medium">
                        {{ session('success') }}
                    </p>

                    <a href="{{ url('/') }}"
                       class="inline-flex items-center justify-center
                              rounded-lg bg-green-600
                              px-6 py-3
                              text-base font-semibold text-white
                              shadow-md
                              transition-all duration-300
                              hover:bg-green-700">
                        Volver al inicio
                    </a>

                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const inicio = document.getElementById('inicio');

                        if (inicio) {
                            inicio.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        } else {
                            window.scrollTo({
                                top: 0,
                                behavior: 'smooth'
                            });
                        }
                    });
                </script>

            @endif


            {{-- ===================================== --}}
            {{--               FORMULARIO              --}}
            {{-- ===================================== --}}

            <div class="mx-auto w-full max-w-2xl">

                <form action="{{ route('contacto.enviar') }}"
                      method="POST"
                      class="space-y-5">

                    @csrf


                    {{-- NOMBRE Y EMAIL --}}

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">


                        {{-- NOMBRE --}}

                        <div>

                            <label for="name"
                                   class="mb-1.5 block text-base font-semibold text-white">
                                Nombre
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Ingresá tu nombre"

                                class="w-full
                                       rounded-xl
                                       border border-gray-600
                                       bg-gray-800
                                       px-4 py-3
                                       text-base text-white
                                       placeholder-gray-500
                                       shadow-sm
                                       outline-none
                                       transition-all duration-200
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-500/40
                                       @error('name')
                                           border-red-500
                                           focus:border-red-500
                                           focus:ring-red-500/40
                                       @enderror">

                            @error('name')
                                <p class="mt-1.5 text-sm text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- EMAIL --}}

                        <div>

                            <label for="email"
                                   class="mb-1.5 block text-base font-semibold text-white">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Ingresá tu email"

                                class="w-full
                                       rounded-xl
                                       border border-gray-600
                                       bg-gray-800
                                       px-4 py-3
                                       text-base text-white
                                       placeholder-gray-500
                                       shadow-sm
                                       outline-none
                                       transition-all duration-200
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-500/40
                                       @error('email')
                                           border-red-500
                                           focus:border-red-500
                                           focus:ring-red-500/40
                                       @enderror">

                            @error('email')
                                <p class="mt-1.5 text-sm text-red-400">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>


                    {{-- MENSAJE --}}

                    <div>

                        <label for="message"
                               class="mb-1.5 block text-base font-semibold text-white">
                            Mensaje
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            placeholder="Escribí tu mensaje"

                            class="w-full
                                   resize-none
                                   rounded-xl
                                   border border-gray-600
                                   bg-gray-800
                                   px-4 py-3
                                   text-base leading-6 text-white
                                   placeholder-gray-500
                                   shadow-sm
                                   outline-none
                                   transition-all duration-200
                                   focus:border-indigo-500
                                   focus:ring-2
                                   focus:ring-indigo-500/40
                                   @error('message')
                                       border-red-500
                                       focus:border-red-500
                                       focus:ring-red-500/40
                                   @enderror">{{ old('message') }}</textarea>

                        @error('message')
                            <p class="mt-1.5 text-sm text-red-400">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- BOTÓN ENVIAR --}}

                    <div class="pt-1">

                        <button
                            type="submit"
                            class="flex w-full
                                   items-center justify-center
                                   rounded-xl
                                   bg-indigo-600
                                   px-8 py-3
                                   text-lg font-bold text-white
                                   shadow-lg
                                   transition-all duration-300
                                   hover:bg-indigo-700
                                   hover:shadow-indigo-500/20
                                   focus:outline-none
                                   focus:ring-4
                                   focus:ring-indigo-500/40
                                   sm:mx-auto
                                   sm:w-auto
                                   sm:min-w-[240px]">

                            Enviar mensaje

                        </button>

                    </div>


                    {{-- ===================================== --}}
                    {{--                 FOOTER                --}}
                    {{-- ===================================== --}}

                    <div class="mt-6 border-t border-gray-700 pt-5">

                        <div class="flex w-full
                                    items-center justify-between
                                    gap-3">


                            {{-- INSTAGRAM --}}

                            <a href="https://www.instagram.com/la_chalita_jma?igsh=MWsxNDhycWo3MXp5Yw=="
                               target="_blank"
                               rel="noopener noreferrer"
                               aria-label="Instagram de La Chalita"

                               class="flex items-center gap-2
                                      text-sm font-medium text-gray-300
                                      transition-colors duration-300
                                      hover:text-pink-500
                                      sm:text-base">

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    class="h-7 w-7 sm:h-8 sm:w-8">

                                    <rect
                                        width="20"
                                        height="20"
                                        x="2"
                                        y="2"
                                        rx="5"
                                        ry="5">
                                    </rect>

                                    <path
                                        d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01">
                                    </path>

                                </svg>

                                <span>Instagram</span>

                            </a>


                            {{-- VOLVER AL INICIO --}}

                            <a href="{{ url('/') }}"
                               class="group flex items-center gap-2
                                      text-sm font-medium text-gray-300
                                      transition-colors duration-300
                                      hover:text-white
                                      sm:text-base">

                                <span>Volver al inicio</span>

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    class="h-6 w-6
                                           transition-transform duration-300
                                           group-hover:-translate-y-1
                                           sm:h-7 sm:w-7">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18">
                                    </path>

                                </svg>

                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>

</body>

</html>
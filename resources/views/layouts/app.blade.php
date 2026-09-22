<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Chalita - @yield('titulo')</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- CSS con Vite --}}
    @vite('resources/css/app.css')

    {{-- Scripts JS personalizados --}}
    <script type="module" src="{{ asset('js/productos.js') }}"></script>
    <script type="module" src="{{ asset('js/productosRender.js') }}"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer">
</head>

<body class="bg-gradient-to-br from-stone-100 to-stone-50">


    {{-- ================================= --}}
    {{--              HEADER               --}}
    {{-- ================================= --}}

    <header>

        <section
            class="relative
                   min-h-[100svh] md:min-h-0
                   bg-cover bg-center bg-no-repeat
                   flex items-center"
            style="background-image: url('{{ asset('img/fondo.jpg') }}');">


            {{-- MENÚ DE NAVEGACIÓN --}}

            <div
                class="absolute
                       top-0 left-0
                       z-20
                       w-full
                       px-2 sm:px-6
                       py-3
                       flex items-center justify-center sm:justify-end">

                <nav
                    class="flex
                           items-center
                           justify-center
                           gap-2 sm:gap-5 md:gap-6
                           whitespace-nowrap">

                    <a href="#nosotros"
                       class="text-white
                              text-sm sm:text-base md:text-lg
                              font-semibold
                              hover:text-gray-300
                              transition-colors duration-200">
                        Inicio
                    </a>

                    <a href="#galeria"
                       class="text-white
                              text-sm sm:text-base md:text-lg
                              font-semibold
                              hover:text-gray-300
                              transition-colors duration-200">
                        Galería
                    </a>

                    <a href="#servicios"
                       class="text-white
                              text-sm sm:text-base md:text-lg
                              font-semibold
                              hover:text-gray-300
                              transition-colors duration-200">
                        Servicios
                    </a>

                    <a href="#productos"
                       class="text-white
                              text-sm sm:text-base md:text-lg
                              font-semibold
                              hover:text-gray-300
                              transition-colors duration-200">
                        Tienda
                    </a>

                    <a href="{{ route('contacto') }}"
                       class="py-2 px-3 sm:px-4
                              text-sm sm:text-base
                              font-semibold
                              text-white
                              rounded-lg
                              border border-gray-600
                              bg-gradient-to-r
                              from-gray-800
                              via-gray-600
                              to-gray-800
                              hover:opacity-80
                              hover:shadow-xl
                              drop-shadow-lg
                              transition-all duration-300">
                        Contacto
                    </a>

                </nav>

            </div>


            {{-- CONTENIDO PRINCIPAL DEL HEADER --}}

            <div
                class="container
                       mx-auto
                       w-full
                       text-center
                       text-white
                       px-4
                       pt-20 pb-10
                       md:pt-24 md:pb-14
                       lg:pt-32 lg:pb-16">


                {{-- LOGO --}}

                <div
                    class="flex
                           justify-center
                           mb-4
                           md:mb-6
                           lg:mb-8">

                    <a href="{{ url('/') }}">

                        <img
                            src="{{ asset('img/logo.png') }}"
                            alt="Chalita Logo"

                            class="h-52 w-52
                                   sm:h-60 sm:w-60
                                   md:h-72 md:w-72
                                   lg:h-96 lg:w-96
                                   object-contain
                                   filter brightness-0">

                    </a>

                </div>


                {{-- TÍTULO PRINCIPAL --}}

                <h1
                    class="mt-4 mb-5
                           px-2
                           text-4xl
                           sm:text-5xl
                           md:text-6xl
                           leading-tight
                           font-extrabold
                           text-black
                           drop-shadow-xl
                           transition-all duration-300">

                    "El cuero, fuerza y elegancia que perdura."

                </h1>


                {{-- TEXTO DESCRIPTIVO --}}

                <p
                    class="mt-4 mb-4
                           px-3
                           sm:px-8
                           md:px-16
                           lg:px-32
                           text-lg
                           sm:text-xl
                           md:text-2xl
                           leading-7
                           sm:leading-8
                           font-medium
                           text-black
                           drop-shadow-lg
                           transition-all duration-300">

                    El cuero es más que un material, es historia, tradición y resistencia.
                    Cada pieza cuenta una historia única, marcada por el tiempo y la artesanía.

                    <br><br>

                    Un material noble que evoluciona con el tiempo, aportando carácter y
                    autenticidad a cada creación.

                </p>

            </div>

        </section>

    </header>


    {{-- ================================= --}}
    {{--        CONTENIDO PRINCIPAL         --}}
    {{-- ================================= --}}

    <main
        class="container
               mx-auto
               pt-2 pb-8
               px-4
               md:px-6
               lg:px-8">

        @yield('content')

        @yield('contenido1')

    </main>


    {{-- ================================= --}}
    {{--         BOTÓN WHATSAPP             --}}
    {{-- ================================= --}}

    <a href="https://wa.me/5493402500139"
       target="_blank"
       rel="noopener noreferrer"
       aria-label="Comunicate por WhatsApp"

       class="js-btn-fixed-bottom
              btn-whatsapp
              fixed
              z-50
              bottom-4 right-4
              flex items-center justify-center
              p-3
              text-white
              bg-green-500
              hover:bg-green-600
              rounded-full
              shadow-lg
              transition duration-300 ease-in-out">

        <img
            src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg"
            alt="WhatsApp"
            class="w-10 h-10 md:w-12 md:h-12">

    </a>


</body>

</html>
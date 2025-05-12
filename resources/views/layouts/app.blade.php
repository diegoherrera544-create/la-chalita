<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chalita - @yield('titulo')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')

    <script type="module" src="{{ asset('js/productos.js') }}"></script>
    <script type="module" src="{{ asset('js/productosRender.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
          integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gradient-to-br from-gray-200 to-gray-300">

          <header>
              <section class="bg-cover bg-center py- relative" style="background-image: url('{{ asset('img/fondo.jpg') }}');">

                  <div class="absolute top-0 left-0 w-full px-6 py-3 flex justify-between items-center">

                  <a href="{{ url('/') }}" class="flex-shrink-0">
                      <img src="{{ asset('img/logo1.png') }}" alt="chalita Logo" class="h-24 w-24 md:h-36 md:w-36 lg:h-48 lg:w-48 brightness-0">
                  </a>

                      <nav class="flex items-center space-x-4 md:space-x-6">
                            <a href="https://portfolio-ayyam.vercel.app/" class="text-white hover:text-gray-300 transition-colors duration-200">Inicio</a>
                            <a href="https://portfolio-ayyam.vercel.app/" class="text-white hover:text-gray-300 transition-colors duration-200">Nosotros</a>
                            <a href="https://portfolio-ayyam.vercel.app/" class="text-white hover:text-gray-300 transition-colors duration-200">Servicios</a>
                            <a href="https://portfolio-ayyam.vercel.app/" class="text-white hover:text-gray-300 transition-colors duration-200">Galeria</a>
                            <a href="https://portfolio-ayyam.vercel.app/" class="text-white hover:text-gray-300 transition-colors duration-200">Productos</a>
                            <button class="px-4 py-2 text-sm font-medium text-white rounded-lg bg-gradient-to-r from-gray-800 via-gray-600 to-gray-800 hover:from-gray-700 hover:via-gray-500 hover:to-gray-700 shadow-lg transition-all duration-300">
                                Admin
                            </button>
                        </nav>
                  </div>

                  <div class="container mx-auto text-center text-white py-20 md:py-28 lg:py-36">
          <div class="flex justify-center mb-4 md:mb-6 lg:mb-8">
              <a href="{{ url('/') }}">
                  <img src="{{ asset('img/logo.png') }}" alt="chalita Logo" class="h-24 w-24 md:h-48 md:w-48 lg:h-64 lg:w-64 filter brightness-0">
              </a>
          </div>
          <h1 class="mt-4 mb-4 text-3xl font-extrabold text-black drop-shadow-xl transition-all duration-300 md:text-4xl lg:text-6xl">
              "El cuero, fuerza y elegancia que perdura.</h1>

          <p class="mt-4 mb-4 text-base sm:text-lg md:px-16 lg:px-32 text-black drop-shadow-lg transition-all duration-300">
              El cuero es más que un material, es historia, tradición y resistencia. Cada pieza cuenta una historia única, marcada por el tiempo y la artesanía.
              <br>
              Un material noble que evoluciona con el tiempo, aportando carácter y autenticidad a cada creación.
          </p>

          <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-4 mt-4">
              <a href="#" class="py-2 px-4 text-sm font-medium text-white rounded-lg border border-gray-600 bg-gradient-to-r from-gray-800 via-gray-600 to-gray-800 hover:opacity-80 hover:shadow-xl drop-shadow-lg transition-all duration-300">
                  Contacto
              </a>
          </div>
      </div>
                  </div>
              </section>
          </header>

          <section class="container mx-auto py-8 px-4 md:px-6 lg:px-8">
              @yield(section: 'contenido1')
          </section>

          

          <a href="https://wa.me/5493402500139" target="_blank" class="js-btn-fixed-bottom btn-whatsapp bg-green-500 hover:bg-green-600 text-white font-bold p-3 rounded-full shadow-lg transition duration-300 ease-in-out fixed bottom-4 right-4 flex items-center justify-center" aria-label="Comunicate por WhatsApp">
              <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="w-10 h-10 md:w-12 md:h-12" alt="WhatsApp">
          </a>

    

</body>
</html>
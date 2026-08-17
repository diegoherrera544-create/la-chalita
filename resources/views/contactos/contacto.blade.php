{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>

{{-- CSS con Vite --}}
@vite('resources/css/app.css')

{{-- Scripts JS personalizados --}}
<script type="module" src="{{ asset('js/productos.js') }}"></script>
<script type="module" src="{{ asset('js/productosRender.js') }}"></script>

<section class="body-font relative bg-gray-900 text-gray-400">

  <div class="container mx-auto px-5 py-24">

    <div class="mb-12 flex w-full flex-col text-center" id="inicio">
      <h1 class="title-font mb-4 text-2xl font-medium text-white sm:text-3xl">Contáctenos</h1>
      <p class="mx-auto text-base leading-relaxed lg:w-2/3">¡No dudes en contactarnos! Si tienes alguna pregunta, 
        comentario o una propuesta de colaboración, nos encantaría saber de ti.
      </p>
    </div>

    {{-- Mensaje éxito --}}
    @if(session('success'))
      <div class="mb-6 bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-lg shadow text-center">
        <p class="mb-4">{{ session('success') }}</p>
        <a href="{{ url('/') }}"
           class="inline-block bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-6 rounded-lg shadow transition-all duration-300">
          Volver al inicio
        </a>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', function () {
          const inicio = document.getElementById("inicio");
          if (inicio) {
            inicio.scrollIntoView({ behavior: "smooth" });
          } else {
            window.scrollTo({ top: 0, behavior: 'smooth' });
          }
        });
      </script>
    @endif

    <div class="mx-auto md:w-2/3 lg:w-1/2">
      <form action="{{ route('contacto.enviar') }}" method="POST" class="-m-2 flex flex-wrap">
        @csrf

        {{-- Nombre --}}
        <div class="w-1/2 p-2">
          <div class="relative">
            <input
              type="text"
              id="name"
              name="name"
              value="{{ old('name') }}"
              class="peer w-full rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 @error('name') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
              placeholder="Name" />
            <label for="name" class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">Nombre</label>
          </div>
          @error('name')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
          @enderror
        </div>

        {{-- Email --}}
        <div class="w-1/2 p-2">
          <div class="relative">
            <input
              type="email"
              id="email"
              name="email"
              value="{{ old('email') }}"
              class="peer w-full rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 @error('email') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
              placeholder="Email" />
            <label for="email" class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">Email</label>
          </div>
          @error('email')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
          @enderror
        </div>

        {{-- Mensaje --}}
        <div class="mt-4 w-full p-2">
          <div class="relative">
            <textarea
              id="message"
              name="message"
              placeholder="Message"
              class="peer h-32 w-full resize-none rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-6 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900 @error('message') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror"
            >{{ old('message') }}</textarea>
            <label for="message" class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">Mensaje</label>
          </div>
          @error('message')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
          @enderror
        </div>

        {{-- Botón enviar --}}
        <div class="w-full p-2">
          <button class="mx-auto flex rounded border-0 bg-indigo-500 py-2 px-8 text-lg text-white hover:bg-indigo-600 focus:outline-none">
            Enviar Mensaje
          </button>
        </div>

        {{-- Footer --}}
<div class="mt-8 w-full border-t border-gray-800 p-2 pt-8">

    <div class="relative flex items-center justify-center">

        {{-- Instagram --}}
        <a href="https://www.instagram.com/la_chalita_jma?igsh=MWsxNDhycWo3MXp5Yw=="
           target="_blank"
           rel="noopener noreferrer"
           class="text-gray-500 hover:text-pink-500 transition-colors duration-300"
           aria-label="Instagram de La Chalita">

            <svg fill="none"
                 stroke="currentColor"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 stroke-width="2"
                 class="h-6 w-6"
                 viewBox="0 0 24 24">

                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>

                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>

            </svg>

        </a>


        {{-- Volver al inicio --}}
        <a href="{{ url('/') }}"
           class="absolute right-0 flex items-center gap-2
                  text-sm sm:text-base text-gray-400
                  hover:text-white
                  transition-all duration-300
                  group">

            <span>Volver al inicio</span>

            <svg xmlns="http://www.w3.org/2000/svg"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke-width="2"
                 stroke="currentColor"
                 class="w-5 h-5 transition-transform duration-300 group-hover:-translate-y-1">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M4.5 10.5 12 3m0 0 7.5 7.5M12 3v18" />

            </svg>

        </a>

    </div>

</div>

      </form>
    </div>
  </div>

</section>

{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>

{{-- CSS con Vite --}}
@vite('resources/css/app.css')

{{-- Scripts JS personalizados --}}
<script type="module" src="{{ asset('js/productos.js') }}"></script>
<script type="module" src="{{ asset('js/productosRender.js') }}"></script>


<div class="text-center">

    <hr>

    <a href="{{ url('/') }}"
       class="flex items-center justify-center py-5 mb-5 text-2xl font-semibold text-gray-900">

        <img
            src="{{ asset('img/logo.png') }}"
            class="h-12 mr-3 sm:h-9"
            alt="La Chalita Logo">

        La Chalita

    </a>


    <span class="block text-sm text-center text-gray-500">
         © 2026 La Chalita™. Todos los derechos reservados.
    </span>


    <!-- Instagram -->
    <div class="flex justify-center mt-5">

        <a
            href="https://www.instagram.com/la_chalita_jma?igsh=MWsxNDhycWo3MXp5Yw=="
            target="_blank"
            rel="noopener noreferrer"
            class="flex items-center gap-2 text-gray-600
                   hover:text-pink-600 transition-all duration-300
                   hover:scale-105">

            <img
                src="https://img.icons8.com/fluent/30/000000/instagram-new.png"
                alt="Instagram La Chalita"
                class="w-8 h-8">

            <span class="text-sm sm:text-base font-medium">
                @la_chalita_jma
            </span>

        </a>

    </div>

</div>
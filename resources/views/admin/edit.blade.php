<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    {{-- Fundamental para celulares --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>La Chalita - Editar producto</title>

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

        <div class="mx-auto w-full max-w-4xl px-4 sm:px-6 lg:px-8">


            {{-- ===================================== --}}
            {{--                 TÍTULO                --}}
            {{-- ===================================== --}}

            <h1 class="mb-6 text-center
                       text-3xl font-extrabold
                       text-indigo-900
                       drop-shadow-sm
                       sm:mb-8 sm:text-4xl">

                🛠️ Editar producto

            </h1>


            {{-- ===================================== --}}
            {{--          ERRORES GENERALES            --}}
            {{-- ===================================== --}}

            @if($errors->any())

                <div class="mb-6 rounded-xl
                            border border-red-300
                            bg-red-50
                            px-5 py-4
                            text-red-700
                            shadow-md">

                    <p class="mb-2 text-base font-bold">
                        ¡Ups! Revisá los siguientes campos:
                    </p>

                    <ul class="list-inside list-disc space-y-1 text-sm sm:text-base">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- ===================================== --}}
            {{--        CONTENEDOR PRINCIPAL           --}}
            {{-- ===================================== --}}

            <div class="rounded-2xl
                        border border-gray-200
                        bg-white
                        p-5
                        shadow-xl
                        sm:p-7
                        md:p-9">


                {{-- ===================================== --}}
                {{--         FORMULARIO DE EDICIÓN         --}}
                {{-- ===================================== --}}

                <form
                    action="{{ route('productos.update', $producto->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-6">

                    @csrf
                    @method('PUT')


                    {{-- ===================================== --}}
                    {{--                NOMBRE                 --}}
                    {{-- ===================================== --}}

                    <div class="border-b border-gray-200 pb-6">

                        <label
                            for="nombre"
                            class="mb-2 block
                                   text-lg font-semibold
                                   text-gray-800">

                            Nombre del producto

                        </label>

                        <input
                            type="text"
                            name="nombre"
                            id="nombre"
                            value="{{ old('nombre', $producto->nombre) }}"
                            required
                            autocomplete="off"
                            placeholder="Ingresá el nombre del producto"

                            class="w-full
                                   rounded-xl
                                   border
                                   bg-white
                                   px-4 py-3.5
                                   text-base text-gray-900
                                   placeholder-gray-400
                                   outline-none
                                   transition duration-200
                                   focus:border-indigo-500
                                   focus:ring-2
                                   focus:ring-indigo-300
                                   @error('nombre')
                                       border-red-500
                                       focus:border-red-500
                                       focus:ring-red-300
                                   @else
                                       border-gray-300
                                   @enderror">

                        @error('nombre')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ===================================== --}}
                    {{--             DESCRIPCIÓN               --}}
                    {{-- ===================================== --}}

                    <div class="border-b border-gray-200 pb-6">

                        <label
                            for="descripcion"
                            class="mb-2 block
                                   text-lg font-semibold
                                   text-gray-800">

                            Descripción

                        </label>

                        <textarea
                            name="descripcion"
                            id="descripcion"
                            rows="5"
                            required
                            placeholder="Ingresá una descripción del producto"

                            class="w-full
                                   resize-y
                                   rounded-xl
                                   border
                                   bg-white
                                   px-4 py-3.5
                                   text-base leading-7 text-gray-900
                                   placeholder-gray-400
                                   outline-none
                                   transition duration-200
                                   focus:border-indigo-500
                                   focus:ring-2
                                   focus:ring-indigo-300
                                   @error('descripcion')
                                       border-red-500
                                       focus:border-red-500
                                       focus:ring-red-300
                                   @else
                                       border-gray-300
                                   @enderror">{{ old('descripcion', $producto->descripcion) }}</textarea>

                        @error('descripcion')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ===================================== --}}
                    {{--                 PRECIO                --}}
                    {{-- ===================================== --}}

                    <div class="border-b border-gray-200 pb-6">

                        <label
                            for="precio"
                            class="mb-2 block
                                   text-lg font-semibold
                                   text-gray-800">

                            Precio

                        </label>

                        <div class="relative">

                            <span class="pointer-events-none
                                         absolute inset-y-0 left-0
                                         flex items-center
                                         pl-4
                                         text-lg font-semibold
                                         text-gray-500">

                                $

                            </span>

                            <input
                                type="number"
                                name="precio"
                                id="precio"
                                step="0.01"
                                min="0"
                                inputmode="decimal"
                                value="{{ old('precio', $producto->precio) }}"
                                required
                                placeholder="0,00"

                                class="w-full
                                       rounded-xl
                                       border
                                       bg-white
                                       py-3.5
                                       pl-9 pr-4
                                       text-base text-gray-900
                                       placeholder-gray-400
                                       outline-none
                                       transition duration-200
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-300
                                       @error('precio')
                                           border-red-500
                                           focus:border-red-500
                                           focus:ring-red-300
                                       @else
                                           border-gray-300
                                       @enderror">

                        </div>

                        @error('precio')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ===================================== --}}
                    {{--            IMÁGENES NUEVAS            --}}
                    {{-- ===================================== --}}

                    <div class="border-b border-gray-200 pb-6">

                        <label
                            for="imagenes"
                            class="mb-2 block
                                   text-lg font-semibold
                                   text-gray-800">

                            Agregar imágenes nuevas

                        </label>

                        <input
                            type="file"
                            name="imagenes[]"
                            id="imagenes"
                            multiple
                            accept="image/*"

                            class="block w-full
                                   cursor-pointer
                                   rounded-xl
                                   border border-gray-300
                                   bg-gray-50
                                   text-sm text-gray-700
                                   transition
                                   file:mr-3
                                   file:border-0
                                   file:bg-indigo-100
                                   file:px-4
                                   file:py-3.5
                                   file:text-sm
                                   file:font-semibold
                                   file:text-indigo-700
                                   hover:file:bg-indigo-200
                                   sm:text-base">

                        <p class="mt-3 text-sm leading-6 text-gray-500">
                            Podés seleccionar una o varias imágenes. Las imágenes
                            nuevas se agregarán a las actuales.
                        </p>

                        @error('imagenes')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                        @error('imagenes.*')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ===================================== --}}
                    {{--           IMÁGENES ACTUALES           --}}
                    {{-- ===================================== --}}

                    @if(!empty($producto->imagenes) && count($producto->imagenes) > 0)

                        <div class="border-b border-gray-200 pb-6">

                            <div class="mb-4">

                                <h2 class="text-lg font-semibold text-gray-800">
                                    Imágenes actuales
                                </h2>

                                <p class="mt-1 text-sm leading-6 text-gray-500">
                                    Marcá las imágenes que quieras eliminar.
                                </p>

                            </div>


                            <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-4">

                                @foreach($producto->imagenes as $imagen)

                                    <div class="overflow-hidden
                                                rounded-xl
                                                border border-gray-200
                                                bg-gray-50
                                                p-2
                                                shadow-sm">

                                        <img
                                            src="{{ asset('storage/' . $imagen) }}"
                                            alt="Imagen de {{ $producto->nombre }}"
                                            loading="lazy"

                                            class="h-32 w-full
                                                   rounded-lg
                                                   object-cover
                                                   sm:h-36">


                                        <label
                                            class="mt-2 flex min-h-[44px]
                                                   cursor-pointer
                                                   items-center gap-2
                                                   rounded-lg
                                                   px-1 py-1
                                                   select-none">

                                            <input
                                                type="checkbox"
                                                name="eliminar_imagenes[]"
                                                value="{{ $imagen }}"

                                                class="h-5 w-5
                                                       shrink-0
                                                       cursor-pointer
                                                       rounded
                                                       border-gray-300
                                                       text-red-600
                                                       accent-red-600">

                                            <span class="text-sm font-medium
                                                         leading-5 text-gray-700">

                                                Eliminar

                                            </span>

                                        </label>

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endif


                    {{-- ===================================== --}}
                    {{--               BOTONES                 --}}
                    {{-- ===================================== --}}

                    <div class="grid grid-cols-1 gap-3 pt-1 sm:grid-cols-2">


                        {{-- ACTUALIZAR --}}

                        <button
                            type="submit"

                            class="inline-flex min-h-[52px] w-full
                                   items-center justify-center gap-2
                                   rounded-xl
                                   bg-blue-600
                                   px-6 py-3
                                   text-lg font-semibold text-white
                                   shadow-md
                                   transition duration-200
                                   hover:bg-blue-700
                                   active:bg-blue-800
                                   focus:outline-none
                                   focus:ring-4
                                   focus:ring-blue-300">

                            <i class="fas fa-save"></i>

                            Actualizar producto

                        </button>


                        {{-- CANCELAR --}}

                        <a
                            href="{{ route('productos.index') }}"

                            class="inline-flex min-h-[52px] w-full
                                   items-center justify-center gap-2
                                   rounded-xl
                                   border border-gray-300
                                   bg-white
                                   px-6 py-3
                                   text-lg font-medium text-gray-700
                                   transition duration-200
                                   hover:bg-gray-100
                                   focus:outline-none
                                   focus:ring-4
                                   focus:ring-gray-200">

                            <i class="fas fa-arrow-left"></i>

                            Cancelar

                        </a>

                    </div>

                </form>


                {{-- ===================================== --}}
                {{--        SEPARADOR DE ELIMINACIÓN       --}}
                {{-- ===================================== --}}

                <div class="my-8 border-t border-gray-200"></div>


                {{-- ===================================== --}}
                {{--          ELIMINAR PRODUCTO            --}}
                {{-- ===================================== --}}

                <div class="rounded-xl
                            border border-red-200
                            bg-red-50
                            p-4
                            sm:p-5">

                    <div class="flex flex-col gap-4
                                sm:flex-row
                                sm:items-center
                                sm:justify-between">

                        <div>

                            <h2 class="text-lg font-bold text-red-800">
                                Eliminar producto
                            </h2>

                            <p class="mt-1
                                      text-sm leading-6
                                      text-red-700">

                                Esta acción eliminará permanentemente el producto
                                y no se puede deshacer.

                            </p>

                        </div>


                        <form
                            action="{{ route('productos.destroy', $producto->id) }}"
                            method="POST"
                            class="w-full sm:w-auto"

                            onsubmit="return confirm('¿Estás seguro de que querés eliminar este producto? Esta acción no se puede deshacer.');">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"

                                class="inline-flex min-h-[50px] w-full
                                       items-center justify-center gap-2
                                       rounded-xl
                                       bg-red-600
                                       px-6 py-3
                                       text-base font-bold text-white
                                       shadow-md
                                       transition duration-200
                                       hover:bg-red-700
                                       active:bg-red-800
                                       focus:outline-none
                                       focus:ring-4
                                       focus:ring-red-300
                                       sm:w-auto">

                                <i class="fas fa-trash"></i>

                                Eliminar producto

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</body>

</html>
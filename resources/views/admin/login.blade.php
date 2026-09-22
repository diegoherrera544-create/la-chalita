<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    {{-- Fundamental para celulares --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>La Chalita - Ingreso Administrador</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- CSS con Vite --}}
    @vite('resources/css/app.css')
</head>

<body class="min-h-[100svh]
             bg-gradient-to-br
             from-indigo-100
             via-white
             to-indigo-200">

    <main class="flex min-h-[100svh]
                 items-center justify-center
                 px-4 py-8
                 sm:px-6 sm:py-12">


        {{-- ===================================== --}}
        {{--          CONTENEDOR DEL LOGIN        --}}
        {{-- ===================================== --}}

        <div class="w-full max-w-md">


            {{-- ENCABEZADO EXTERIOR --}}

            <div class="mb-6 text-center">

                <div class="mx-auto mb-4
                            flex h-20 w-20
                            items-center justify-center
                            rounded-full
                            bg-indigo-600
                            text-white
                            shadow-lg
                            shadow-indigo-500/30">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-11 w-11">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M12 3.75 4.5 6v5.25c0 4.846 3.047 8.293 7.5 9.75 4.453-1.457 7.5-4.904 7.5-9.75V6L12 3.75Z">
                        </path>

                    </svg>

                </div>

                <h1 class="text-3xl font-extrabold
                           text-indigo-900
                           sm:text-4xl">

                    Panel administrador

                </h1>

                <p class="mt-2 text-base text-gray-600">
                    Ingresá tus datos para continuar.
                </p>

            </div>


            {{-- ===================================== --}}
            {{--              FORMULARIO              --}}
            {{-- ===================================== --}}

            <form
                method="POST"
                action="{{ route('admin.login.submit') }}"

                class="rounded-2xl
                       border border-gray-200
                       bg-white
                       p-5
                       shadow-2xl
                       sm:p-8">

                @csrf


                {{-- TÍTULO INTERNO --}}

                <h2 class="mb-6 text-center
                           text-2xl font-bold
                           text-indigo-700">

                    Ingreso Administrador

                </h2>


                {{-- ===================================== --}}
                {{--         ERRORES DEL LOGIN             --}}
                {{-- ===================================== --}}

                @if($errors->any())

                    <div
                        role="alert"
                        class="mb-6 flex items-start gap-3
                               rounded-xl
                               border border-red-300
                               bg-red-50
                               px-4 py-3
                               text-red-700">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="mt-0.5 h-6 w-6 shrink-0">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 9v3.75m9-3.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 7.5h.008v.008H12V16.5Z">
                            </path>

                        </svg>

                        <div>

                            <p class="font-semibold">
                                No se pudo iniciar sesión
                            </p>

                            <p class="mt-1 text-sm leading-5">
                                {{ $errors->first() }}
                            </p>

                        </div>

                    </div>

                @endif


                <div class="space-y-5">


                    {{-- ===================================== --}}
                    {{--                 EMAIL                 --}}
                    {{-- ===================================== --}}

                    <div>

                        <label
                            for="email"
                            class="mb-2 block
                                   text-base font-semibold
                                   text-gray-800">

                            Email

                        </label>

                        <div class="relative">

                            <div class="pointer-events-none
                                        absolute inset-y-0 left-0
                                        flex items-center
                                        pl-4
                                        text-gray-400">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    class="h-5 w-5">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-8.69 5.518a2.25 2.25 0 0 1-2.42 0L2.25 6.75">
                                    </path>

                                </svg>

                            </div>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                value="{{ old('email') }}"
                                required
                                autofocus
                                autocomplete="email"
                                inputmode="email"
                                placeholder="administrador@email.com"

                                class="w-full
                                       rounded-xl
                                       border
                                       bg-white
                                       py-3.5
                                       pl-12 pr-4
                                       text-base text-gray-900
                                       placeholder-gray-400
                                       outline-none
                                       transition duration-200
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-300
                                       @error('email')
                                           border-red-500
                                       @else
                                           border-gray-300
                                       @enderror">

                        </div>

                        @error('email')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ===================================== --}}
                    {{--              CONTRASEÑA               --}}
                    {{-- ===================================== --}}

                    <div>

                        <label
                            for="password"
                            class="mb-2 block
                                   text-base font-semibold
                                   text-gray-800">

                            Contraseña

                        </label>

                        <div class="relative">

                            <div class="pointer-events-none
                                        absolute inset-y-0 left-0
                                        flex items-center
                                        pl-4
                                        text-gray-400">

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    class="h-5 w-5">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16.5 10.5V6.75a4.5 4.5 0 0 0-9 0v3.75m-.75 0h10.5A2.25 2.25 0 0 1 19.5 12.75v6A2.25 2.25 0 0 1 17.25 21H6.75A2.25 2.25 0 0 1 4.5 18.75v-6a2.25 2.25 0 0 1 2.25-2.25Z">
                                    </path>

                                </svg>

                            </div>

                            <input
                                type="password"
                                name="password"
                                id="password"
                                required
                                autocomplete="current-password"
                                placeholder="Ingresá tu contraseña"

                                class="w-full
                                       rounded-xl
                                       border
                                       bg-white
                                       py-3.5
                                       pl-12 pr-14
                                       text-base text-gray-900
                                       placeholder-gray-400
                                       outline-none
                                       transition duration-200
                                       focus:border-indigo-500
                                       focus:ring-2
                                       focus:ring-indigo-300
                                       @error('password')
                                           border-red-500
                                       @else
                                           border-gray-300
                                       @enderror">


                            {{-- MOSTRAR/OCULTAR CONTRASEÑA --}}

                            <button
                                type="button"
                                id="togglePassword"
                                aria-label="Mostrar contraseña"
                                aria-pressed="false"

                                class="absolute inset-y-0 right-0
                                       flex w-12
                                       items-center justify-center
                                       text-gray-500
                                       transition
                                       hover:text-indigo-600
                                       focus:outline-none">

                                {{-- OJO ABIERTO --}}

                                <svg
                                    id="eyeOpen"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    class="h-6 w-6">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M2.25 12s3.75-6 9.75-6 9.75 6 9.75 6-3.75 6-9.75 6S2.25 12 2.25 12Z">
                                    </path>

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z">
                                    </path>

                                </svg>


                                {{-- OJO CERRADO --}}

                                <svg
                                    id="eyeClosed"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="2"
                                    stroke="currentColor"
                                    class="hidden h-6 w-6">

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m3 3 18 18M10.6 10.6a2 2 0 0 0 2.8 2.8M9.9 4.24A10.8 10.8 0 0 1 12 4c6 0 9.75 8 9.75 8a17.6 17.6 0 0 1-2.11 3.06M6.61 6.61C3.93 8.22 2.25 12 2.25 12S6 20 12 20a9.8 9.8 0 0 0 4.03-.86">
                                    </path>

                                </svg>

                            </button>

                        </div>

                        @error('password')

                            <p class="mt-2 text-sm font-medium text-red-600">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ===================================== --}}
                    {{--                INGRESAR                --}}
                    {{-- ===================================== --}}

                    <button
                        type="submit"

                        class="inline-flex min-h-[54px] w-full
                               items-center justify-center gap-2
                               rounded-xl
                               bg-indigo-600
                               px-6 py-3
                               text-lg font-bold text-white
                               shadow-lg
                               shadow-indigo-500/20
                               transition duration-300
                               hover:bg-indigo-700
                               active:bg-indigo-800
                               focus:outline-none
                               focus:ring-4
                               focus:ring-indigo-300">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="2"
                            stroke="currentColor"
                            class="h-6 w-6">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6A2.25 2.25 0 0 0 5.25 5.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3-3H9m0 0 3-3m-3 3 3 3">
                            </path>

                        </svg>

                        Ingresar

                    </button>

                </div>

            </form>


            {{-- VOLVER AL SITIO --}}

            <div class="mt-6 text-center">

                <a
                    href="{{ url('/') }}"

                    class="inline-flex min-h-[44px]
                           items-center justify-center gap-2
                           px-4
                           text-base font-semibold
                           text-indigo-700
                           transition
                           hover:text-indigo-900
                           hover:underline">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="h-5 w-5">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18">
                        </path>

                    </svg>

                    Volver al sitio

                </a>

            </div>

        </div>

    </main>


    {{-- ===================================== --}}
    {{--       MOSTRAR/OCULTAR CONTRASEÑA     --}}
    {{-- ===================================== --}}

    <script>

        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        togglePassword.addEventListener('click', function () {

            const passwordVisible = passwordInput.type === 'text';

            passwordInput.type = passwordVisible ? 'password' : 'text';

            eyeOpen.classList.toggle('hidden', !passwordVisible);
            eyeClosed.classList.toggle('hidden', passwordVisible);

            togglePassword.setAttribute(
                'aria-label',
                passwordVisible ? 'Mostrar contraseña' : 'Ocultar contraseña'
            );

            togglePassword.setAttribute(
                'aria-pressed',
                passwordVisible ? 'false' : 'true'
            );

        });

    </script>

</body>

</html>
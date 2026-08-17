@extends('layouts.app')

@section('contenido1')

    <section id="imagenes" class="mt-24">
        <h1 id="galeria"
            class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-center my-10 mb-12 text-black shadow-[0_8px_15px_rgba(0,0,0,0.7)]">
            Galería
        </h1>

        @include('carousel.carrusel')  {{-- Aquí se muestra el carrusel de imágenes --}}
    </section>


    <style>
        .zoom {
            transform: scale(1.5) !important;
            transition: transform 0.3s ease-in-out !important;
            z-index: 10;
            position: relative;
        }
    </style>


    <script>
        function toggleZoom(id) {
            const img = document.getElementById(id);
            img.classList.toggle('zoom');
        }
    </script>


    <!-- ========================== -->
    <!--        MEMORIAS            -->
    <!-- ========================== -->

    <section
        class="relative w-full mx-auto mt-10 py-10 sm:py-14 lg:py-16
               overflow-hidden
               bg-gradient-to-br
               from-slate-950
               via-slate-900
               to-blue-950
               text-white">

        <!-- Luz azul superior izquierda -->
        <div
            class="absolute -top-32 -left-32
                   w-80 h-80 sm:w-96 sm:h-96
                   bg-blue-600/20
                   rounded-full
                   blur-3xl
                   pointer-events-none">
        </div>

        <!-- Luz celeste inferior derecha -->
        <div
            class="absolute -bottom-40 -right-32
                   w-96 h-96 sm:w-[500px] sm:h-[500px]
                   bg-cyan-500/10
                   rounded-full
                   blur-3xl
                   pointer-events-none">
        </div>

        <!-- Luz azul central -->
        <div
            class="absolute
                   top-1/2 left-1/2
                   -translate-x-1/2 -translate-y-1/2
                   w-[90%] sm:w-[700px]
                   h-[300px]
                   bg-blue-500/5
                   rounded-full
                   blur-3xl
                   pointer-events-none">
        </div>


        <!-- Todo el contenido queda por encima de los efectos -->
        <div class="relative z-10">

            <!-- Título de sección -->
            <div
                id="nosotros"
                class="w-fit pb-1 px-2 mx-4 md:mx-8
                       rounded-md
                       text-2xl sm:text-3xl
                       font-semibold
                       border-b-2
                       border-yellow-500">

                MEMORIAS

            </div>


            <div
                class="w-full flex justify-center
                       px-4 sm:px-6 lg:px-8
                       py-8 sm:py-10">


                <!-- CONTENEDOR PRINCIPAL -->
                <div
                    class="w-full max-w-7xl
                           flex flex-col lg:flex-row
                           items-stretch
                           gap-6 lg:gap-10
                           p-3 sm:p-5 lg:p-6
                           rounded-2xl

                           bg-white/[0.03]
                           backdrop-blur-sm

                           border border-white/10

                           shadow-2xl">


                    <!-- ========================== -->
                    <!--          IMAGEN            -->
                    <!-- ========================== -->

                    <div
                        class="w-full lg:w-1/2
                               flex items-center justify-center
                               rounded-xl
                               overflow-hidden

                               bg-black/10

                               border border-white/5

                               shadow-xl">

                        <img
                            src="{{ asset('img/memorias-abuelo.png') }}"
                            alt="Días de Lluvia, Cuero: Memorias con mi Abuelo"

                            class="w-full
                                   h-auto
                                   max-h-[750px]
                                   object-contain
                                   rounded-xl
                                   transition-all
                                   duration-500
                                   hover:scale-[1.02]"
                        />

                    </div>


                    <!-- ========================== -->
                    <!--           TEXTO            -->
                    <!-- ========================== -->

                    <div
                        class="w-full lg:w-1/2
                               flex flex-col justify-center
                               rounded-xl

                               p-4 sm:p-6 lg:p-8

                               bg-slate-950/30
                               backdrop-blur-sm

                               border border-white/5">


                        <!-- Título -->
                        <h2
                            class="text-2xl
                                   sm:text-3xl
                                   lg:text-4xl
                                   font-semibold
                                   leading-tight
                                   text-white">

                            Días de Lluvia, Cuero: Memorias con mi Abuelo

                        </h2>


                        <!-- Línea decorativa -->
                        <div
                            class="w-20 h-[2px]
                                   mt-4 mb-1
                                   bg-yellow-500
                                   rounded-full">
                        </div>


                        <!-- Texto -->
                        <p
                            class="text-sm
                                   sm:text-base
                                   lg:text-lg
                                   leading-7
                                   lg:leading-8
                                   mt-5
                                   text-gray-300">

                            Cuando era chico, los días de lluvia tenían un encanto especial.
                            Mientras las gotas repiqueteaban en el techo de chapa, con mi abuelo
                            nos refugiábamos en el galpón donde el olor a cuero crudo se mezclaba
                            con el de la tierra mojada. Esos días no eran para quedarse quietos,
                            sino para poner las manos a trabajar, remendando lo que el trajín con
                            los animales rompía: monturas, riendas, cinchas, todo lo que llevaba
                            el sello del esfuerzo diario.

                            <br><br>

                            Con la maceta, mi abuelo me enseñaba a sobar lonjas, un ritual lento
                            y preciso. Cada golpe era una lección de paciencia, con cada tiento
                            una historia que se tejía entre nosotros. Mientras trabajábamos, él
                            hablaba. Contaba de sus años mozos, de las hazañas de los gauchos,
                            de noches bajo las estrellas y de lecciones que la vida en el campo
                            le había grabado a fuego. Sus palabras, como el cuero, eran fuertes
                            y nobles, llenas de sabiduría que yo absorbía sin darme cuenta.
                            Pero no solo eran historias: a veces, con la mirada perdida en el
                            horizonte gris, recitaba versos. Coplas y décimas que hablaban de
                            la vida y el amor.

                            <br><br>

                            Esos días de lluvia no solo arreglábamos objetos; tejíamos recuerdos.

                            <br><br>

                            El galpón, el cuero, los versos y sus historias se convirtieron en un
                            legado que aún vive en mí. Cada gota de lluvia me trae de nuevo su voz,
                            sus manos curtidas y la magia de aquellos momentos.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ========================== -->
    <!--        SERVICIOS           -->
    <!-- ========================== -->

    <section id="servicios" class="mt-24">
        @include('servicios.servicio')  {{-- Aquí se muestra los servicios ofrecidos --}}
    </section>


    <!-- ========================== -->
    <!--        PRODUCTOS           -->
    <!-- ========================== -->

    <section id="productos" class="mt-24">
        @include('productos.producto')  {{-- Aquí se muestra los productos en ventas --}}
    </section>


    <!-- ========================== -->
    <!--          FOOTER            -->
    <!-- ========================== -->

    <section class="mt-24">
        @include('footer.piedepagina') {{-- Aquí se muestra los productos en ventas --}}
    </section>


@endsection
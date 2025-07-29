@extends('layouts.app')

@section('contenido1')

    <section id="imagenes" class="mt-24">
            <h1 id="galeria" class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-center my-10 mb-12 text-black shadow-[0_8px_15px_rgba(0,0,0,0.7)]">
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


        <section class="w-full mx-auto mt-10 py-10 bg-gray-50 dark:bg-gray-900 dark:text-white">
            <!-- Title -->
            <div id="nosotros" class="w-fit pb-1 px-2 mx-4 rounded-md text-2xl font-semibold border-b-2 border-blue-600 dark:border-b-2 dark:border-yellow-600">
                NUESTRA HISTORIA
            </div>

            <div class="w-full h-full flex flex-col items-center md:py-4 py-10">
                <!-- Col - 2 -->
                <div
                    class="xl:w-[80%] sm:w-[85%] w-[90%] mx-auto flex md:flex-row flex-col lg:gap-4 gap-2 justify-center lg:items-stretch md:items-center mt-4">
                    <!--  -->
                    <img class="md:w-[50%] w-full md:rounded-t-lg rounded-sm" src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHxob21lfGVufDB8MHx8fDE3MTA0OTAwNjl8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="billboard image" />

                    <div class="md:w-[50%] w-full bg-gray-300 dark:bg-gray-900 dark:text-gray-400 md:p-4 p-0 rounded-md">
                        <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Días de Lluvia, Cuero: Memorias con mi Abuelo</h2>
                        <p class="text-md mt-4">Cuando era chico, los días de lluvia tenían un encanto especial. Mientras las gotas repiqueteaban en el techo de chapa, con mi abuelo nos refugiábamos en el galpón donde el olor a cuero crudo se mezclaba con el de la tierra mojada. Esos días no eran para quedarse quietos, sino para poner las manos a trabajar, remendando lo que el trajín con los animales rompía: monturas, riendas, cinchas, todo lo que llevaba el sello del esfuerzo diario.
                            Con la maceta, mi abuelo me enseñaba a sobar lonjas, un ritual lento y preciso. Cada golpe era una lección de paciencia, con cada tiento una historia que se tejía entre nosotros. Mientras trabajábamos, él hablaba. Contaba de sus años mozos, de las hazañas de los gauchos, de noches bajo las estrellas y de lecciones que la vida en el campo le había grabado a fuego. Sus palabras, como el cuero, eran fuertes y nobles, llenas de sabiduría que yo absorbía sin darme cuenta. Pero no solo eran historias: a veces, con la mirada perdida en el horizonte gris, recitaba versos. Coplas y décimas que hablaban de la vida y el amor.
                            Esos días de lluvia no solo arreglábamos objetos; tejíamos recuerdos.
                            El galpón, el cuero, los versos y sus historias se convirtieron en un legado que aún vive en mí. Cada gota de lluvia me trae de nuevo su voz, sus manos curtidas y la magia de aquellos momentos.</p>
                    </div>
                </div>              
            </div>
        </section>

        <section id="servicios" class="mt-24">
            @include('servicios.servicio')  {{-- Aquí se muestra los servicios ofrecidos --}}
        </section>
               
        <section id="productos" class="mt-24">
            @include('productos.producto')  {{-- Aquí se muestra los productos en ventas --}}
        </section>

        <section class="mt-24"> 
          @include('footer.piedepagina') {{-- Aquí se muestra los productos en ventas --}}
        </section>
    
@endsection
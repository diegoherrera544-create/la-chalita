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


        <section class="w-full mx-auto py-10 bg-gray-50 dark:bg-gray-900 dark:text-white">
            <!-- Title -->
            <div id="nosotros" class="w-fit pb-1 px-2 mx-4 rounded-md text-2xl font-semibold border-b-2 border-blue-600 dark:border-b-2 dark:border-yellow-600">
                NOSOTROS
            </div>

            <div class="w-full h-full flex flex-col items-center md:py-4 py-10">
                <!-- Col - 2 -->
                <div
                class="xl:w-[80%] sm:w-[85%] w-[90%] mx-auto flex md:flex-row flex-col lg:gap-4 gap-2 justify-center lg:items-stretch md:items-center mt-4">
                <!--  -->
                <img class="md:w-[50%] w-full md:rounded-t-lg rounded-sm" src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw1fHxob21lfGVufDB8MHx8fDE3MTA0OTAwNjl8MA&ixlib=rb-4.0.3&q=80&w=1080" alt="billboard image" />

                <div class="md:w-[50%] w-full bg-gray-100 dark:bg-gray-900 dark:text-gray-400 md:p-4 p-0 rounded-md">
                    <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Lorem ipsum dolor sit amet consectetur</h2>
                    <p class="text-md mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda nam
                    veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione eligendi
                    sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus fuga
                    nobis tempora possimus ullam!</p>
                </div>

                </div>
                <!-- Col - 3 -->
                <div
                class="xl:w-[80%] sm:w-[85%] w-[90%] mx-auto flex md:flex-row flex-col flex-col-reverse lg:gap-4 gap-2 justify-center lg:items-stretch md:items-center mt-6">
                <!--  -->
                <div class="md:w-[50%] w-full bg-gray-100 dark:bg-gray-900 dark:text-gray-400 md:p-4 p-0 rounded-md">
                    <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Lorem ipsum dolor sit amet consectetur</h2>

                    <p class="text-md mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda nam
                    veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione eligendi
                    sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus fuga
                    nobis tempora possimus ullam!</p>
                </div>
                <!--  -->
                <img class="md:w-[50%] w-full md:rounded-t-lg rounded-sm" src="https://images.unsplash.com/photo-1516455590571-18256e5bb9ff?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxMXx8aG9tZXxlbnwwfDB8fHwxNzEwNDkwMDcwfDA&ixlib=rb-4.0.3&q=80&w=1080" alt="billboard image" />

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
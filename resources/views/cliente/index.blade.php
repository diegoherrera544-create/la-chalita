@extends('layouts.app')

@section('contenido1')


<h1 class="text-6xl sm:text-7xl md:text-8xl font-extrabold text-center my-8 mb-24 text-black shadow-[0_8px_15px_rgba(0,0,0,0.7)]">
    Galería
</h1>



<h2 class="text-3xl font-extrabold text-yellow-900 sm:text-4xl mt-24">El Arte del Cuero</h2>
                    <p class="mt-4 text-gray-600 text-lg">"Explora la robustez y la belleza natural del cuero crudo en cada una de mis creaciones artesanales.
                        Desde la funcionalidad precisa de los cuchillos de hoja fuerte, pasando por la tradición y el carácter de los mates únicos,
                        hasta la resistencia y el estilo de los cinturones duraderos y los detalles rústicos de los elementos de decoración,
                        cada pieza es una manifestación de la nobleza del cuero sin curtir, trabajada con dedicación y respeto por el material."</p>
    <div class="py-8 lg:py-16 px-4 md:px-12 mt-12">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="w-full cursor-pointer">
                <img id="img1" src="https://images.unsplash.com/photo-1530035415911-95194de4ebcc?q=80&amp;w=2670&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="rounded-xl rotate-6 hover:rotate-0 duration-300 w-full h-auto object-cover transform origin-bottom"
                    alt="#_" onclick="toggleZoom('img1')">
            </div>
            <div class="w-full cursor-pointer">
                <img id="img2" src="https://images.unsplash.com/photo-1487180144351-b8472da7d491?q=80&amp;w=2672&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D "
                    class="rounded-xl -rotate-12 hover:rotate-0 duration-300 w-full h-auto object-cover transform origin-bottom"
                    alt="#_" onclick="toggleZoom('img2')">
            </div>
            <div class="w-full cursor-pointer">
                <img id="img3" src="https://images.unsplash.com/photo-1586996292898-71f4036c4e07?q=80&amp;w=2670&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="rounded-xl rotate-6 hover:rotate-0 duration-300 w-full h-auto object-cover transform origin-bottom"
                    alt="#_" onclick="toggleZoom('img3')">
            </div>
            <div class="w-full cursor-pointer">
                <img id="img4" src="https://images.unsplash.com/photo-1522775417749-29284fb89f43?q=80&amp;w=2574&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="rounded-xl -rotate-12 hover:rotate-0 duration-300 w-full h-auto object-cover transform origin-bottom"
                    alt="#_" onclick="toggleZoom('img4')">
            </div>
        </div>
    </div>


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


        <section class="bg-gray-100 mt-24">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-black text-left my-10 shadow-[0px_4px_6px_rgba(0,0,0,0.6)]">
    Nosotros
</h1>

            <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                    <div class="max-w-lg">
                        <h2 class="text-3xl font-extrabold text-yellow-900 sm:text-4xl">Pasión por el arte</h2>
                        <p class="mt-4 text-gray-600 text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis
                            eros at lacus feugiat hendrerit sed ut tortor. Suspendisse et magna quis elit efficitur consequat.
                            Mauris eleifend velit a pretium iaculis. Donec sagittis velit et magna euismod, vel aliquet nulla
                            malesuada. Nunc pharetra massa lectus, a fermentum arcu volutpat vel.</p>

                    </div>
                    <div class="mt-12 md:mt-0">
                        <img src="https://images.unsplash.com/photo-1531973576160-7125cd663d86" alt="About Us Image" class="object-cover rounded-lg shadow-md">
                    </div>
                </div>
            </div>
        </section>
                
        <section class="mt-24">
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-black text-center my-10 shadow-[0px_4px_6px_rgba(0,0,0,0.6)]">
              Imagenes
          </h1>
            @include('carousel.carrusel') {{-- Aquí se muestra el carrusel --}}
        </section>

        <section class="mt-24"> 
          @include('servicios.servicio') {{-- Aquí se muestra los servicios --}}
        </section>
               
        <section class="mt-24"> 
          @include('productos.product') {{-- Aquí se muestra los productos en ventas --}}
        </section>
    
@endsection
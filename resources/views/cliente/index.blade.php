@extends('layouts.app')

@section('contenido1')


    

    <section id="imagenes" class="mt-24">
            <h1 id="galeria" class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-center my-8 mb-24 text-black shadow-[0_8px_15px_rgba(0,0,0,0.7)]">
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


        <section id="nosotros" class="bg-gray-100 mt-24">
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
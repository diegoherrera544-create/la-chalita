@extends('layouts.app')

@section('contenido1')


<h1 class="text-6xl sm:text-7xl md:text-8xl font-extrabold text-center my-8 mb-24 text-yellow-600 shadow-xl">
    Galeria
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
        <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold text-yellow-600 shadow-xl">
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


        
        <main>        
            <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold text-yellow-600 text-center my-10 shadow-2xl">
                Imagenes
            </h1>

                    <div id="gallery" class="relative w-full" data-carousel="slide">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                            <!-- Item 1 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                            </div>
                            <!-- Item 2 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
        </main>   
@endsection
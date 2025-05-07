@extends('layouts.app')

@section('carrusel')
<div class="max-w-7xl mx-auto p-6">
    <div class="text-center mb-6">
        <h1 class="text-3xl font-bold">Auto-Sliding Carousel</h1>
        <p class="text-gray-600 dark:text-gray-400">Auto-slide through your content seamlessly.</p>
    </div>

    <div class="relative overflow-hidden rounded-lg shadow-lg">
        <div class="carousel flex transition-transform duration-700 ease-in-out">
            <div class="carousel-item flex-shrink-0 w-full">
                <img src="https://res.cloudinary.com/djv4xa6wu/image/upload/v1735722161/AbhirajK/Abhirajk2.webp" alt="Slide 1" class="w-full h-64 object-cover rounded-md">
                <h2 class="text-xl font-semibold mt-4">Slide 1</h2>
                <p class="text-gray-600 dark:text-gray-400">This is the first slide of the carousel.</p>
            </div>

            <div class="carousel-item flex-shrink-0 w-full">
                <img src="https://res.cloudinary.com/djv4xa6wu/image/upload/v1735722161/AbhirajK/Abhirajk3.webp" alt="Slide 2" class="w-full h-64 object-cover rounded-md">
                <h2 class="text-xl font-semibold mt-4">Slide 2</h2>
                <p class="text-gray-600 dark:text-gray-400">This is the second slide of the carousel.</p>
            </div>

            <div class="carousel-item flex-shrink-0 w-full">
                <img src="https://res.cloudinary.com/djv4xa6wu/image/upload/v1735722163/AbhirajK/Abhirajk%20mykare.webp" alt="Slide 3" class="w-full h-64 object-cover rounded-md">
                <h2 class="text-xl font-semibold mt-4">Slide 3</h2>
                <p class="text-gray-600 dark:text-gray-400">This is the third slide of the carousel.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const carousel = document.querySelector(".carousel");
            const slides = document.querySelectorAll(".carousel-item");
            let currentIndex = 0;

            setInterval(() => {
                currentIndex = (currentIndex + 1) % slides.length;
                carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
            }, 4000); // Cambio cada 4 segundos
        });
    </script>

    <div class="text-center mt-6">
        <p class="text-gray-500 dark:text-gray-400">
            This carousel automatically slides through the content using JavaScript.
        </p>
    </div>
</div>
@endsection
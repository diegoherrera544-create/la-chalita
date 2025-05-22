{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>

{{-- CSS con Vite --}}
@vite('resources/css/app.css')

{{-- Scripts JS personalizados --}}
<script type="module" src="{{ asset('js/productos.js') }}"></script>
<script type="module" src="{{ asset('js/productosRender.js') }}"></script>

<section class="bg-[#fffdf6] dark:bg-slate-800" id="contact">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <!-- Título -->
        <div class="text-center mb-12">
            <h2 class="text-4xl sm:text-5xl font-bold tracking-tight text-gray-900 dark:text-white">
                Contáctanos
            </h2>
            <p class="mt-4 text-lg text-gray-600 dark:text-slate-400 max-w-2xl mx-auto">
                Siempre estamos listos para apoyarte.
            </p>
        </div>

        <!-- Contenido principal -->
        <div class="flex flex-col-reverse gap-10 md:grid md:grid-cols-2 md:gap-12 items-start">
            <!-- Información de contacto -->
            <div class="space-y-8">
                <p class="text-gray-600 dark:text-slate-400 text-lg">
                    Puedes comunicarte con nosotros mediante los siguientes medios:
                </p>

                <!-- Dirección -->
                <div class="flex gap-4 items-start">
                    <div class="h-12 w-12 flex items-center justify-center bg-blue-900 text-white rounded-full shadow">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/>
                            <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Dirección</h3>
                        <p class="text-gray-600 dark:text-slate-400">GMK Bulvarı No:140 / Anadolu Meydanı</p>
                        <p class="text-gray-600 dark:text-slate-400">Çankaya / ANKARA</p>
                    </div>
                </div>

                <!-- Contacto -->
                <div class="flex gap-4 items-start">
                    <div class="h-12 w-12 flex items-center justify-center bg-blue-900 text-white rounded-full shadow">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"/>
                            <path d="M15 7a2 2 0 0 1 2 2"/>
                            <path d="M15 3a6 6 0 0 1 6 6"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Contacto</h3>
                        <p class="text-gray-600 dark:text-slate-400">Teléfono: +90 312 939 70 00</p>
                        <p class="text-gray-600 dark:text-slate-400">Mail: info@cezerilabs.net</p>
                        <p class="text-gray-600 dark:text-slate-400">Facebook: <a class="text-blue-600 underline" href="https://www.facebook.com/josemaria.arebalo" target="_blank">/josemaria.arebalo</a></p>
                        <p class="text-gray-600 dark:text-slate-400">Instagram: <a class="text-blue-600 underline" href="https://www.instagram.com/la_chalita_jma/" target="_blank">@la_chalita_jma</a></p>
                    </div>
                </div>

                <!-- Horario -->
                <div class="flex gap-4 items-start">
                    <div class="h-12 w-12 flex items-center justify-center bg-blue-900 text-white rounded-full shadow">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"/>
                            <path d="M12 7v5l3 3"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Horario</h3>
                        <p class="text-gray-600 dark:text-slate-400">Lunes a Viernes: 08:00 - 17:00</p>
                    </div>
                </div>
            </div>

            <!-- Mapa -->
            <div class="rounded-xl overflow-hidden shadow-md">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3059.295250119642!2d32.83635427648936!3d39.93478498483043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d34ee59d316beb%3A0x4215599e3269afae!2sT%C4%B0KA%20-%20Turkish%20Cooperation%20and%20Coordination%20Agency!5e0!3m2!1sen!2sus!4v1730227400833!5m2!1sen!2sus"
                    class="w-full h-[400px] sm:h-[450px] md:h-[100%] border-0"
                    loading="lazy"
                    allowfullscreen
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

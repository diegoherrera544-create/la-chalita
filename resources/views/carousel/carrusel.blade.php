<style>
.carousel-container{perspective:1000px;touch-action:pan-y pinch-zoom}
.carousel-item{backface-visibility:hidden;transition:opacity .5s ease,transform .5s ease}
.carousel-item.active{opacity:1;transform:scale(1);z-index:10}
.carousel-item.prev,.carousel-item.next,.carousel-item.hidden{opacity:0;transform:scale(.95);pointer-events:none}
.nav-button{background:rgba(15,23,42,.7);backdrop-filter:blur(10px);border:1px solid rgba(255,255,255,.15);transition:.3s}
.nav-button:hover{background:rgba(30,41,59,.95)}
.carousel-image{transition:transform .6s ease}
@media(hover:hover){.carousel-card:hover .carousel-image{transform:scale(1.025)}}
.progress-bar{transition:width .5s ease}
</style>

<section class="relative w-full py-6 sm:py-10 overflow-hidden bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950">
    <div class="absolute -top-40 -left-40 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl"></div>

    <div class="relative z-10 w-full max-w-5xl mx-auto px-3 sm:px-6">
        <div class="carousel-container relative">

            <div class="absolute top-0 left-0 right-0 h-1 bg-white/10 rounded-full overflow-hidden z-30">
                <div class="progress-bar h-full bg-gradient-to-r from-blue-500 to-cyan-400"></div>
            </div>

            <button type="button"
                class="nav-button absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center z-30 text-white"
                onclick="prevSlide()">
                ‹
            </button>

            <button type="button"
                class="nav-button absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12 rounded-full flex items-center justify-center z-30 text-white"
                onclick="nextSlide()">
                ›
            </button>

            <div class="carousel-track relative h-[280px] sm:h-[360px] md:h-[460px] lg:h-[520px] overflow-hidden rounded-2xl">

                @forelse ($productosCarrusel as $index => $producto)

                    <div class="carousel-item {{ $index === 0 ? 'active' : 'hidden' }} absolute inset-0 w-full h-full">

                        <div class="w-full h-full p-2 sm:p-4">

                            <div class="carousel-card relative w-full h-full rounded-2xl overflow-hidden bg-slate-950 border border-white/10 shadow-2xl">

                                @if(isset($producto->imagenes) && count($producto->imagenes) > 0)

                                    <img
                                        src="{{ asset('storage/' . $producto->imagenes[0]) }}"
                                        alt="{{ $producto->nombre }}"
                                        class="carousel-image absolute inset-0 w-full h-full object-contain object-center"
                                    />

                                @else

                                    <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                                        Sin imagen disponible
                                    </div>

                                @endif

                                <div class="absolute inset-x-0 bottom-0 h-[45%] bg-gradient-to-t from-black/95 via-black/40 to-transparent"></div>

                                <div class="absolute inset-x-0 bottom-0 p-4 sm:p-6">
                                    <h3 class="text-white text-lg sm:text-2xl md:text-3xl font-bold">
                                        {{ $producto->nombre }}
                                    </h3>
                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="absolute inset-0 flex items-center justify-center text-gray-300">
                        No hay productos para mostrar.
                    </div>

                @endforelse

            </div>

            @if($productosCarrusel->count() > 1)
                <div class="flex justify-center gap-2 mt-4">
                    @foreach($productosCarrusel as $index => $producto)
                        <button
                            type="button"
                            data-slide="{{ $index }}"
                            class="carousel-indicator h-1.5 rounded-full transition-all duration-300 {{ $index === 0 ? 'w-10 bg-white/80' : 'w-5 bg-white/20' }}">
                        </button>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded',()=>{
    let currentSlide=0,timer,touchStartX=0,touchEndX=0;
    const slides=document.querySelectorAll('.carousel-item');
    const indicators=document.querySelectorAll('.carousel-indicator');
    const progressBar=document.querySelector('.progress-bar');
    const carousel=document.querySelector('.carousel-track');

    function updateSlides(){
        slides.forEach((slide,index)=>{
            slide.classList.remove('active','prev','next','hidden');
            if(index===currentSlide) slide.classList.add('active');
            else if(index===(currentSlide+1)%slides.length) slide.classList.add('next');
            else if(index===(currentSlide-1+slides.length)%slides.length) slide.classList.add('prev');
            else slide.classList.add('hidden');
        });

        indicators.forEach((indicator,index)=>{
            indicator.className=`carousel-indicator h-1.5 rounded-full transition-all duration-300 ${
                index===currentSlide?'w-10 bg-white/80':'w-5 bg-white/20'
            }`;
        });

        if(progressBar&&slides.length)
            progressBar.style.width=`${((currentSlide+1)/slides.length)*100}%`;
    }

    function resetTimer(){
        clearInterval(timer);
        if(slides.length>1) timer=setInterval(()=>{
            currentSlide=(currentSlide+1)%slides.length;
            updateSlides();
        },5000);
    }

    window.nextSlide=()=>{
        if(slides.length<=1)return;
        currentSlide=(currentSlide+1)%slides.length;
        updateSlides();
        resetTimer();
    };

    window.prevSlide=()=>{
        if(slides.length<=1)return;
        currentSlide=(currentSlide-1+slides.length)%slides.length;
        updateSlides();
        resetTimer();
    };

    indicators.forEach((indicator,index)=>{
        indicator.addEventListener('click',()=>{
            currentSlide=index;
            updateSlides();
            resetTimer();
        });
    });

    if(carousel){
        carousel.addEventListener('touchstart',e=>{
            touchStartX=e.changedTouches[0].screenX;
        },{passive:true});

        carousel.addEventListener('touchend',e=>{
            touchEndX=e.changedTouches[0].screenX;
            const diff=touchStartX-touchEndX;
            if(Math.abs(diff)>50) diff>0?nextSlide():prevSlide();
        },{passive:true});

        carousel.addEventListener('mouseenter',()=>clearInterval(timer));
        carousel.addEventListener('mouseleave',resetTimer);
    }

    updateSlides();
    resetTimer();
});
</script>
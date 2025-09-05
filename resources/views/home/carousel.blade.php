<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="max-width: 1110px; margin: 0 auto; height:auto;">

    {{-- indicadores --}}
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" 
                class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" 
                aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" 
                aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" 
                aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" 
                aria-label="Slide 5"></button>
    </div>

    {{-- imagens --}}
    <div class="carousel-inner" style="height:auto;">
        <div class="carousel-item active" style="height:auto;">
            <img class="d-block w-100" 
                 src="{{ asset('assets/images/carousel/nirvana.png') }}" 
                 alt="First slide"
                 style="width:100%; height:auto; display:block;">
        </div>
        <div class="carousel-item" style="height:auto;">
            <img class="d-block w-100" 
                 src="{{ asset('assets/images/carousel/led_zeppelin.png') }}" 
                 alt="Second slide"
                 style="width:100%; height:auto; display:block;">
        </div>
        <div class="carousel-item" style="height:auto;">
            <img class="d-block w-100" 
                 src="{{ asset('assets/images/carousel/gojira.png') }}" 
                 alt="Third slide"
                 style="width:100%; height:auto; display:block;">
        </div>

         <div class="carousel-item" style="height:auto;">
            <img class="d-block w-100" 
                 src="{{ asset('assets/images/carousel/limp-bizkit.png') }}" 
                 alt="Four slide"
                 style="width:100%; height:auto; display:block;">
        </div>
        
        <div class="carousel-item" style="height:auto;">
            <img class="d-block w-100" 
                 src="{{ asset('assets/images/carousel/all_night_rock.png') }}" 
                 alt="Four slide"
                 style="width:100%; height:auto; display:block;">
        </div>
    </div>

    {{-- controles --}}
    <div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
</div>

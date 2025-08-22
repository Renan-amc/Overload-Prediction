@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            
            {{-- indicadores --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" 
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" 
                        aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" 
                        aria-label="Slide 3"></button>
            </div>

            {{-- imagens --}}
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 carousel-img" src="{{ asset('assets/images/black_sabbath.png') }}" alt="Slide Black Sabbath">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 carousel-img" src="{{ asset('assets/images/soad.png') }}" alt="Slide System of a down">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100 carousel-img" src="{{ asset('assets/images/gojira.png') }}" alt="Slide Gojira">
                </div>
            </div>

            {{-- controles --}}
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
@endsection

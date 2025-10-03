@extends('layouts.app')

@section('title', 'Home')


@section('content')
<div class="bg-dark">
    <div class="container-fluid p-0"
        style="background: linear-gradient(to bottom, #212529, #f9ca24);">

    
        {{-- Carousel --}}
        @include('home.carousel')
        

        {{-- Hero Section --}}
        </div>
        <section class="hero bg-dark my-3 text-center py-5 d-flex flex-column align-items-center justify-content-center">
            <div class="container text-warning">
                <h1>Bem vindo ao BeeTickets</h1>
                <p>Encontre aqui vários ingresso pros maiores eventos do Brazil. Não fique de fora e já garanta seu ingresso!</p>
                <a href="{{ route('buy-tickets') }}" class="btn btn-warning text-dark my-3 fw-bold">Procure eventos aqui.</a>
            </div>
        </section>

        {{-- Lista de ingressos --}}
        <div 
        style= "background: linear-gradient(to bottom, #f9ca24, #dbb321ff, #f9ca24);
                background-color: #f4eb4a">
            <div class="card-body">
                @include('home.list')
            </div>
        </div>
        
    </div>
</div>
@endsection

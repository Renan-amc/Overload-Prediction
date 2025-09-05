@extends('layouts.app')

@section('title', 'Home')

@section('styles')
    <style>
        body {
            background-color: #FFC107 !important; /* ou qualquer cor */
        }
    </style>
@endsection


@section('content')
<div class="bg-dark"
    style="background: linear-gradient(to bottom, #212529, #f9ca24);>
    <div class="container-fluid p-0">

    
        {{-- Carousel --}}
        @include('home.carousel')
        

        {{-- Hero Section --}}
        </div>
        <section class="hero bg-dark my-3 text-center py-5 d-flex flex-column align-items-center justify-content-center">
            <div class="container text-warning">
                <h1>Bem vindo ao BeeTickets</h1>
                <p>Encontre aqui vários ingresso pros maiores eventos do Brazil. Não fique de fora e já garanta seu ingresso!</p>
                <a href="{{ route('buy-tickets') }}" class="btn btn-warning text-dark my-3">Procure eventos aqui.</a>
            </div>
        </section>

        {{-- Mais informações --}}
        
    </div>
</div>
@endsection

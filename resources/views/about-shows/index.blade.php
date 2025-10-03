@extends('layouts.app')

@section('title', 'Home')


@section('content')
    @foreach ($tickets as $ticket)
    <div class="position-relative overflow-hidden rounded-3 my-4" style="background-color: #000; color: white;">

    <!-- Imagem de fundo embaçada -->
    <div class="position-absolute top-0 start-0 w-100 h-100" 
         style="background-image: '{{ asset('storage/' . $ticket->event->imageShow)}}'); 
                background-size: cover; 
                background-position: center; 
                filter: blur(15px); 
                z-index: 1;">
    </div>

    <!-- Conteúdo na frente -->
    <div class="row g-0 position-relative" style="z-index: 2; background: rgba(0,0,0,0.4);">
        
        <!-- Textos à esquerda -->
        <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
            <h5 class="text-uppercase">Sobre Shows Legalzinho</h5>
            <h2 class="fw-bold">{{ $ticket->event->name }}</h2>
            <p>Venha assistir ao show de {{ $ticket->event->name }} no {{ $ticket->event->location }} no dia {{ $ticket->event->formattedDate() }}</p>
        </div>

        <!-- Imagem nítida à direita -->
        <div class="col-md-6 d-flex align-items-center justify-content-center p-4">
            <img src="{{ asset('storage/' . $ticket->event->imageShow)}}" alt="{{ $ticket->event->name }}" class="img-fluid rounded-3 shadow" style="max-height: 300px;">
        </div>

        </div>
    </div>
    @endforeach


@endsection('content')
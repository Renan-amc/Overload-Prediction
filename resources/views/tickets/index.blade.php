@extends('layouts.app')

@section('title', 'Comprar Ingressos')

@section('content')
    <div class="container mt-3">
        @include('tickets.alerts')
        <div class="card shadow-sm w-100 mb-1 bg-dark">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">

                    {{-- Imagens de fundo de colméias --}}
                    <img src="{{ asset('assets/images/favo.png') }}" 
                        alt="Favo"
                        class="position-fixed"
                        style="top: 50vh; left: -32vw; width: 60vw; max-width: 900px; opacity: 0.12; z-index: -1; pointer-events: none;">

                    <img src="{{ asset('assets/images/favo.png') }}" 
                        alt="Favo"
                        class="position-fixed"
                        style="top: 4vh; right: -22vw; width: 60vw; max-width: 900px; opacity: 0.12; z-index: -1; pointer-events: none;">

                    <img src="{{ asset('assets/images/favo.png') }}" 
                        alt="Favo"
                        class="position-fixed"
                        style="bottom: 19vh; right: 67vw; width: 70vw; max-width: 900px; opacity: 0.12; z-index: -1; pointer-events: none;">
                        
                    {{-- Formulário de busca --}}
                    <form action="{{ route('buy-tickets') }}" method="GET" class="d-flex w-75">
                        <input type="text" 
                            name="event" 
                            class="form-control bg-dark text-light border-light dark-placeholder me-2" 
                            placeholder="Digite o nome do evento" value="{{ request('event') ?? '' }}">
                        <button type="submit" class="btn btn-success">Pesquisar</button>
                    </form>

                    {{-- Carrinho --}}
                    <div class="ms-3">
                        @if(session()->has('cart'))
                            <a href="{{ route('cart.index') }}" class="text-decoration-none text-black">
                                <span class="fs-4 fw-bold">
                                    <i class="fa fa-cart-shopping text-warning fs-4">
                                        ( {{ count(session()->get('cart')) }} )
                                    </i>
                                </span>
                            </a>
                        @else
                        <a href="{{ route('cart.index') }}" class="text-decoration-none text-black">
                            <span class="fs-4 fw-bold text-warning">
                                <i class="fas fa-shopping-cart fa-x1"></i>
                                ( 0 )
                            </span>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Lista de ingressos --}}
        <div class="card shadow-sm w-100 mb-3 bg-dark">
            <div class="card-body">
                @include('tickets.list')
            </div>
        </div>
    </div>
@endsection

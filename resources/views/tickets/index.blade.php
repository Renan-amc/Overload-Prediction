@extends('layouts.app')

@section('title', 'Comprar Ingressos')

@section('content')
    <div class="container mt-3">
        <div class="card shadow-sm w-100 mb-1  bg-dark">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <form action="{{ route('buy-tickets') }}" method="GET" class="row d-flex align-items-end">
                        <div class="col-10">
                            <input type="text" 
                                name="event" 
                                class="form-control mt-1 bg-dark text-light border-light dark-placeholder" 
                                placeholder="Digite o nome do evento" value="{{ request('event') ?? '' }}">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success" href=""> Pesquisar</button>
                        </div>
                    </form>
                    <div class="row d-flex align-items-center me-3">
                        <div class="col-3">
                            <a href=""><i class="fa fa-cart-shopping text-warning fs-4"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow-sm w-100 mb-3 bg-dark">
            <div class="card-body">
                {{-- Mostrar Lista de Ingressos --}}
                @include('tickets.list')
            </div>
        </div>
    </div>
@endsection
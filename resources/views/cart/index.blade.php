@extends('layouts.app')

@section('title', 'Comprar Ingressos')

@section('content')
    <div class="mt-1">
        @include('tickets.alerts')
    </div>
    <div class="row my-5">
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-body bg-dark">
                    <h2 class="mb-4 text-warning">
                        <i class="fas fa-cart-arrow-down"></i> Seu Carrinho de compras
                    </h2>
                    @if (empty($cart))
                        <div class="alert alert-info">
                            Seu carrinho está vazio
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-primary">Tela Inicial</a>
                    @else
                        <div class="table-responsive border border-2 border-warning shadow-sm">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Produto</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Preço</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                    <div class="text-white">
                                    </div>
                                        <tr class="">
                                            {{-- Mostrar imagem/nome do ingresso --}}
                                            <td>
                                                <img src="{{ asset('storage/' . $item['image']) }}" 
                                                    alt="{{ $item['name'] }}" 
                                                    class="rounded" 
                                                    width="100"
                                                    height="60"
                                                >
                                                <span class="ms-1 fw-bold">
                                                    {{ $item['name'] }}
                                                </span>
                                            </td>

                                            {{-- Atualizar Item --}}
                                            <td scope="row">
                                                <form action="{{ route('cart-update') }}" method="post"
                                                    class="d-flex gap-2"
                                                >
                                                    @csrf
                                                    @method("PUT")
                                                    <input 
                                                        type="hidden" name="product_id" 
                                                        value="{{ $item['id'] }}">
                                                    <input 
                                                        min="1"
                                                        name="qty"
                                                        type="number" 
                                                        class="form-control w-auto" 
                                                        value="{{ $item['qty'] }}"
                                                    >
                                                    <button type="submit" class="btn btn-warning">
                                                        <i class="fas fa-pencil"></i> Atualizar                                                
                                                    </button>
                                                </form>
                                            </td>

                                            {{-- Mostrar preço unitário do ingresso --}}
                                            <td class="fw-bold">
                                                    {{ $item['price'] ? number_format($item['price'],2,',','.') : '' }}
                                            </td>

                                            {{-- Mostrar preço subtotal dos ingressos --}}
                                            <td class="fw-bold">
                                                R${{ $item['price'] * $item['qty'] }}
                                            </td>


                                            {{-- Remover Item --}}
                                            <td>
                                                <form action="{{ route('cart-remove') }}" method="post"
                                                    class="d-flex gap-2"
                                                >
                                                    @csrf
                                                    @method("DELETE")
                                                    <input 
                                                        type="hidden" name="product_id" 
                                                        value="{{ $item['id'] }}">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class="fas fa-xmark"></i> Remover                                              
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6"
                                            class="text-end fw-bold fs-4">
                                            Total :
                                        </td>
                                        
                                        <td colspan="2"
                                            class="text-warning fs-5">
                                            R${{ session()->get('cartItemsTotal') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <form action="{{ route('cart-clear') }}" method="post"
                                class="d-flex gap-2"
                            >
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fas fa-trash-can"></i> Limpar carrinho                                              
                                </button>
                            </form>
                            <a href="#" class="btn btn-success">
                                Continuar pro pagamento
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('title', 'Comprar Ingressos')

@section('content')
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
                        <a href="{{ route('home') }}" class="btn btn-primary">Home</a>
                    @else
                        <div class="table-responsive border border-2 border-warning shadow-sm">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cart as $item)
                                    <div class="text-white">
                                    </div>
                                        <tr class="">
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
                                            <td scope="row">
                                                <input 
                                                    min="1"
                                                    type="number" 
                                                    class="form-control w-auto" 
                                                    value="{{ $item['qty'] }}"
                                                >
                                            </td>
                                            <td class="fw-bold">
                                                    {{ $item['price'] }}
                                            </td>
                                            <td class="fw-bold">
                                                ${{ $item['price'] * $item['qty'] }}
                                            </td>
                                            <td>
                                                {{-- botão para remover item do carrinho aqui --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6"
                                            class="text-end fw-bold fs-4">
                                            Total
                                        </td>
                                        
                                        <td colspan="2"
                                            class="text-danger fs-5">
                                            ${{ session()->get('cartItemsTotal') }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
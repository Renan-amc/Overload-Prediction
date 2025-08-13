@extends('layouts.app')

@section('title', 'Selecionar')


@section('content')
    <h1>Selecionando Produtos</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Validade</th>
                <th>Valor</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($produtos as $produto)
            <tr>
                <th>{{ $produto->id }}</th>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->categoria }}</td>
                <td>{{ $produto->data }}</td>
                <td>{{ $produto->valor }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection()
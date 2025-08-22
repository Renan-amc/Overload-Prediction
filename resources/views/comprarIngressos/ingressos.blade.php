@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="container-fluid p-0">

<h1>COMPRE SEU INGRESSO AQUI!</h1>

<div class="mx-auto mt-200 position-relative" style="width: 70%; background: rgba(255,255,0,0.7); border-radius: 8px; margin-top: 2.5rem;">
    <h4 class="position-absolute" style="top: -2.2rem; left: 0; margin: 0;">Entrada</h4>
    <span class="badge text-bg-secondary col">Sab 26/02/2026</span>
    <div class="row justify-content-beetwen">
            <h3 class="col">Homem</h3>
            <select class="form-select form-select-bg-size col">
            <option selected>Selecione</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            </select>
        <h3 class="col">Mulher</h3>
        <select class="form-select form-select-bg-size col">
        <option selected>Selecione</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        </select>
</div>
    
@endsection

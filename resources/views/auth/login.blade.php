@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="container mt-4 position-relative">

        {{-- Favo no canto superior esquerdo --}}
        <img src="{{ asset('assets/images/favo.png') }}" 
             alt="Favo"
             class="position-fixed"
             style="top: -80vh; left: -22vw; width: 60vw; max-width: 900px; opacity: 0.12; z-index: 0; pointer-events: none;">

        <div class="row justify-content-center position-relative" style="z-index: 1;">
            <div class="col-md-6">
                <div class="card shadow p-5 rounded-pill" style="background-color: #1d1a1a;">
                    
                    {{-- Logo --}}
                    <div class="text-center p-6 mb-5 mt-4">
                         <img src="{{ asset('assets/images/logo_branco.png') }}" alt="Logo" class="img-fluid w-100" style="max-width: 220px;">
                    </div>

                    {{-- Formulário --}}
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <form action="{{ route('login-submit') }}" method="post" novalidate>
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label class="form-label text-white" for="text_username">E-mail</label>
                                    <input type="email" class="form-control" name="username" placeholder="Digite o seu usuário" required>
                                    @error('username')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label text-white" for="text_password">Senha</label>
                                    <input type="password" class="form-control" name="password" placeholder="Digite a sua senha" required>
                                    @error('password')
                                        <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1 text-center">
                                    <button type="submit" class="btn btn-warning" id="btn_login"><i class="fa fa-sign-in"></i> Login</button>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <a href="">Cadastrar-se</a>
                                </div>
                            </form>

                            {{-- Erros de login --}}
                             @if(session('loginError'))
                                <div class="alert alert-danger text-center mt-3">
                                    {{ session('loginError') }}
                                </div>
                            @endif

                            <div class="mt-5 text-yellow container fs-6 text-center">
                                &copy; {{ date('Y') }} BeeTickets.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Favo no canto inferior direito --}}
        <img src="{{ asset('assets/images/favo.png') }}" 
             alt="Favo"
             class="position-fixed"
             style="top: -1vh; right: -20vw; width: 50vw; max-width: 800px; opacity: 0.12; z-index: 0; pointer-events: none;">
    </div>
@endsection

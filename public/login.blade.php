@extends('layouts.main_layout')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="card shadow p-5" style="background-color: #ffffff;">
                    
                    <!-- logo -->
                    <div class="text-center p-6 mb-5 mt-4">
                        <img src="{{ asset('assets/images/logo_notes.png') }}" alt="Notes logo" class="img-fluid w-100" style="max-width: 220px;">
                    </div>

                    <!-- form -->
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-12">
                            <form action="{{ route('login-submit') }}" method="post" novalidate>
                                @csrf
                                <div class="mb-3 mt-3">
                                    <label class="form-label" for="text_username">E-mail</label>
                                    <input type="email" class="form-control" name="username" placeholder="Digite o seu usuário" value="{{ old('username') }}" required>
                                    {{-- error input --}}
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="text_password">Senha</label>
                                    <input type="password" class="form-control" name="password" placeholder="Digite a sua senha" value="{{ old('password') }}" required>
                                    {{-- error input --}}
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-1 text-center">
                                    <button type="submit" class="btn btn-primary text-white" id="btn_login"><i class="fa fa-sign-in"></i> Login</button>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <a href="{{ route('register') }}">Cadastrar-se</a>
                                </div>
                            </form>

                            @if(session('loginError'))
                                <div class="alert alert-danger text-center mt-3">
                                    {{ session('loginError') }}
                                </div>
                            @endif

                            <div class="mt-5 container fs-6 text-center">
                                &copy; {{ date('Y') }} Notes.
                            </div>

                            {{-- error --}}
                            {{-- @if($errors->any())
                                <div class="alert alert-danger mt-3">
                                    <ul class="m-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif  --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

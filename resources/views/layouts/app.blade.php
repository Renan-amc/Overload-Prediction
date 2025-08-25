<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Projetinho dos Guri - @yield('title')</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        {{-- Tela de Loading --}}
        @include('partials.loading')

        {{-- Header --}}
        @if(!Request::is('login'))
            @include('partials.navbar')
        @endif

        {{-- Conteúdo --}}
        <main>
            @yield('content')
        </main>

        {{-- Footer --}}
        @if(!Request::is('login'))
            @include('partials.footer')
        @endif

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        @include('partials.js.jsLoading')
    </body>
</html>
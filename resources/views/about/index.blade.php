@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid p-0">
        
        <div class="max-vh-10 d-flex justify-content-center align-items-center flex-column text-center mt-4 p-4 border rounded-pill "
                style="top: 8vw; left: 23vw; background-color: rgb(33, 37, 41);">
            <div class="w-50 mx-auto m-4 border rounded"
                style="background-color: rgb(255, 193, 7)">
                <h1 class="fw-bold text-black" >Sobre nós</h1>
            </div>

            <div class="d-flex m-5 flex-row">
                <p class="fw-light fs-4 text-white">Nós estamos fazendo essa aplicação da beeTickets em inspiração a Eventin que seria pra compra de ingressos online, porém como quando vamos comprar nesses sites e acaba tendo muitas requisições por muitas pessoas quererem comprar ao mesmo tempo tivemos a ideia de otimizar esse processo adicionando uma aplicação parecida com a eventin de compra de ingressos online, em uma aplicação orquestrada por um docker swarm otimizando cada processos de uma aplicaçõa separando-as em containers e otimizando assim a aplicação com resiliência e melhor distribuição de carga com a ajuda do docker. Assim vamos monitorar essa aplicação feita sem a utilização de uma conteinerização e com uma conteinerização mostrando seus pontos relevantes em comparações</p>
            </div> 

            {{-- LINKS PRA REDES SOCIAIS --}}
            <div class="d-flex justify-content-center container text-center">
                {{-- RENAN  --}}
                <div class="me-5">
                    <img src="{{ asset('storage/users/renan_couto.png') }}" 
                        class="rounded-circle img-fluid"
                        alt="Foto de perfil Renan"
                        style="width: 120px; height: 120px;">

                    <div class="m-5">
                        <a href="https://www.linkedin.com/in/renan-couto-307109237/" class="text-warning fs-5 text-decoration-none" target="_blank" title="LinkedIn">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </a>

                        <a href="https://github.com/Renan-amc" class="text-warning fs-5 text-decoration-none" target="_blank" title="GitHub">
                            <i class="fab fa-github fa-2x"></i>
                        </a>
                    </div>
                </div>

                {{-- LUCAS  --}}
                <div class="ml-5">
                    <img src="{{ asset('storage/users/lucas_muner.png') }}" 
                        class="rounded-circle img-fluid"
                        alt="Foto de perfil Lucas"
                        style="width: 120px; height: 120px;">

                    <div class="m-5">
                        <a href="https://www.linkedin.com/in/lucasmuner/" class="text-warning fs-5 text-decoration-none" target="_blank" title="LinkedIn">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </a>

                        <a href="https://github.com/lucasMuner" class="text-warning fs-5 text-decoration-none" target="_blank" title="GitHub">
                            <i class="fab fa-github fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <img src="{{ asset('assets/images/favo.png') }}" 
            alt="Favo"
            class="position-fixed"
            style="top: 10vh; left: -12vw; width: 60vw; max-width: 900px; opacity: 0.12; z-index: -1; pointer-events: none;">

        <img src="{{ asset('assets/images/favo.png') }}" 
            alt="Favo"
            class="position-fixed"
            style="top: 10vh; right: -22vw; width: 40vw; max-width: 900px; opacity: 0.12; z-index: -1; pointer-events: none;">

        <img src="{{ asset('assets/images/favo.png') }}" 
            alt="Favo"
            class="position-fixed"
            style="bottom: 12vh; right: 30vw; width: 70vw; max-width: 900px; opacity: 0.12; z-index: -1; pointer-events: none;">
    </div>
@endsection

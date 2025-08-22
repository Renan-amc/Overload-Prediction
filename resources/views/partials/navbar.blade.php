<nav class="navbar shadow-sm sticky-top navbar-dark bg-dark">
    <div class="row justify-content-between w-100">
        <div class="col-auto">
            <a class="navbar-brand" href="">
                <img src="{{ asset('assets/images/logo_branco.png') }}" width="150" height="auto" alt="">
            </a>
        </div>
        <div class="col-auto d-flex justify-content-center align-items-center">
            <a class="nav-link px-3 py-2 mx-2 text-dark fw-semibold bg-warning rounded-pill" 
                href="{{ route('home') }}">
                Home
            </a>
            <a class="nav-link px-3 py-2 mx-2 text-dark fw-semibold bg-white rounded-pill" 
                href="{{ route('comprarIngressos') }}">
                Comprar Ingressos
            </a>
            <a class="nav-link px-3 py-2 mx-2 text-dark fw-semibold bg-warning rounded-pill" href="#">
                Sobre
            </a>
            <a class="nav-link px-3 py-2 mx-2 text-dark fw-semibold bg-white rounded-pill" href="#">
                Contato
            </a>
        </div>
        <div class="col-auto">
            <div class="d-flex justify-content-end align-items-center">
                 <!-- Foto do usuário -->
                <img src="" 
                     alt="Perfil" 
                     class="rounded-circle me-3" 
                     width="40" 
                     height="40">

                <button class="btn btn-warning" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                <i class="fa fa-sign-in"></i>
                </button>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>

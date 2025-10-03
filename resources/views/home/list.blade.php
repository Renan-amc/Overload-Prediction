@if (isset($tickets) && $tickets->isEmpty())
    <div class="alert alert-info" role="alert">
        Nenhum ingresso disponível no momento.
    </div>
@else
    <div class="container">
        <div class="row g-4"> {{-- linha única, com espaçamento entre cards --}}
            @foreach ($tickets as $ticket)
                    <div class="col-md-6 col-lg-4"> {{-- 2 por linha em md, 3 por linha em lg --}}
                        <a  class="text-decoration-none"
                            href="{{ route('about-shows', ['event' => $ticket->event_id])}}">
                            <div class="row g-0 h-100 nav-show">
                                <!-- Foto do ingresso -->
                                <div class="row-md-8p-2">
                                    <img src="{{ asset('storage/' . $ticket->event->image)}}" 
                                        class="img-fluid" 
                                        alt="Imagem do Ingresso">
                                </div>

                                <!-- Detalhes do ingresso -->
                                <div class="row-md-4">
                                    <div class="d-flex flex-column justify-content-betweenm h-100 p-2"">
                                        <div class="row">
                                            <h5 class="text-danger">
                                                Data: {{ $ticket->event->formattedDate() }}
                                            </h5>
                                            <h3 class="text-dark">{{ $ticket->event->name }}</h3>
                                            <p class="text-secondary">{{ $ticket->event->location }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach
        </div>
    </div>
@endif

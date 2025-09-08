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
                        href="{{ route('buy-tickets') }}">
                            <div class="row g-0 h-100">
                                <!-- Foto do ingresso -->
                                <div class="row-md-8p-2 bg-warning">
                                    <img src="{{ asset('storage/' . $ticket->event->image)}}" 
                                        class="img-fluid rounded-3" 
                                        alt="Imagem do Ingresso">
                                </div>

                                <!-- Detalhes do ingresso -->
                                <div class="row-md-4">
                                    <div class="d-flex flex-column justify-content-between h-100 bg-warning p-2">
                                        <div class="row">
                                            <h5 class="text-danger">
                                                Data:
                                                @php
                                                    $start = \Carbon\Carbon::parse($ticket->event->start_date);
                                                    $end = \Carbon\Carbon::parse($ticket->event->end_date);
                                                @endphp
                                                @if($start->isSameDay($end))
                                                    {{ $start->format('d/m/Y') }} - {{ $start->format('H:i') }} às {{ $end->format('H:i') }}
                                                @else
                                                    {{ $start->format('d/m/Y') }} a {{ $end->format('d/m/Y') }}
                                                @endif
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

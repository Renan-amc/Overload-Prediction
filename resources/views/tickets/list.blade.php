@if (isset($tickets) && $tickets->isEmpty())
    <div class="alert alert-info" role="alert">
        Nenhum ingresso disponível no momento.
    </div>
@else
    @foreach ($tickets as $ticket)
        <div class="card w-100 bg-warning mb-3 border border-2 border-warning shadow-sm">
            <div class="row g-0">
                <!-- Foto do ingresso -->
                <div class="col-md-4 d-flex align-items-center justify-content-center p-3 bg-dark rounded-start">
                    <img src="{{ asset('storage/' . $ticket->event->image)}}" class="img-fluid rounded-3" width="1000vh" alt="Imagem do Ingresso">
                </div>

                <!-- Detalhes do ingresso -->
                <div class="col-md-8">
                    <div class="card-body d-flex flex-column justify-content-between h-100 bg-dark p-3 text-white rounded-end">
                        <div class="row">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="card-title mb-0">{{ $ticket->event->name }}</h5>
                            <!-- Verifica se a entrada/saida sao o mesmos dias se são, ele mostra as horas do evento naquele dia  -->
                                <small class="text-white">
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
                                </small>

                            </div>
                            <p class="card-text">{{ $ticket->event->description }}</p>
                        </div>

                        <!-- Controle de quantidade -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div>
                                <h4 class="text-warning mb-0">R$ {{ number_format($ticket->price,2,',','.') }}</h4>
                            </div>
                            <div class="d-flex align-items-center">
                                <form action="{{ route('cart-add') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $ticket->id }}">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-shopping-cart"></i> Adicionar ao carrinho
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

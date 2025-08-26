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
                                <small class="text-white">Data: 
                                    {{ date('d/m/Y',strtotime($ticket->event->start_date)) }} a 
                                    {{ date('d/m/Y',strtotime($ticket->event->end_date)) }}
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
                                <button class="btn btn-danger btn-lg me-2 rounded-circle"><i class="fa fa-minus"></i></button>
                                <span class="fw-bold fs-3">0 </span>
                                <button class="btn btn-success btn-lg ms-2 rounded-circle"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

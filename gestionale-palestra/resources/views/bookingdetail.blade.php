<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h1 class="fs-1 fw-bolder uppercase">
                {{ __('iscrizione: '. $corso->name) }}
            </h1>
        </div>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <h3 class="fs-2 mb-2">Info Corso</h3>
                        <p><b>Nome corso:</b> {{$corso->name}}</p>
                        <p><b>Descrizione:</b> {{$corso->description}}</p>
                        <p><b>Prezzo:</b> €{{$corso->price}}</p>

                    </div>
                    <div class="mb-4">
                        <h3 class="fs-2 mb-2">Info Iscrizione</h3>
                        <p><b>Giorno di partecipazione:</b> {{$corso->pivot->day}}</p>
                        <p><b>Orario:</b> {{$corso->pivot->start_time}}</p>
                        <p><b>Stato della domanda di iscrizione:</b>
                            @if($corso->pivot->state==='Pending')
                                <span><i>In attesa di approvazione...</i></span>
                            @elseif($corso->pivot->state==='Approved')
                                <span><i>Iscritto</i></span>
                            @elseif($corso->pivot->state==='Reject')
                                <span><i>Domanda rifiutata</i></span>
                            @elseif($corso->pivot->state==='Erased')
                                <span><i>Domanda cancellata</i></span>
                            @endif
                        </p>
                    </div>
                    <div class="mb-4">
                        <form action="/bookings/{{$corso->pivot->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">Cancella Iscrizione</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

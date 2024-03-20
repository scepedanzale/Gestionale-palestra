<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h1 class="fs-1 fw-bolder uppercase">
                {{ __('I tuoi corsi') }}
            </h1>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="main overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container-fluid p-6 text-gray-900">
                    <div class="row">
                        <ul class="list-group">
                            @foreach(Auth::user()->courses as $corso)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>{{$corso->name}}</b>
                                    @if($corso->pivot->state==='Pending')
                                        <span><i>In attesa di approvazione...</i></span>
                                    @elseif($corso->pivot->state==='Approved')
                                        <span><i>Iscritto</i></span>
                                    @elseif($corso->pivot->state==='Reject')
                                        <span><i>Domanda rifiutata</i></span>
                                    @elseif($corso->pivot->state==='Erased')
                                        <span><i>Domanda cancellata</i></span>
                                    @endif
                                    <a href="/bookings/{{$corso->id}}" class="btn btn-outline-dark">Dettaglio</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

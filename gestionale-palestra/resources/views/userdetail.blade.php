<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h1 class="fs-1 fw-bolder uppercase">
                {{ __('Utente: #' . $user->id) }}
            </h1>
        </div>

    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <h3 class="fs-2 mb-2">Informazioni Personali</h3>
                        <p><b>Nome: </b>{{$user->firstname}}</p>
                        <p><b>Cognome: </b>{{$user->lastname}}</p>
                        <p><b>Email: </b>{{$user->email}}</p>
                        <p><b>Data iscrizione: </b>{{$user->created_at}}</p>
                        <p><b>Amministratore: </b>
                            @if($user->admin)
                                E' amministratore
                            @else
                                Non è amministratore
                            @endif
                        </p>
                    </div>
                    <div class="mb-4">
                        @if(count($user->courses)>0)
                            <h3 class="fs-2 mb-2">Iscrizioni dell'Utente</h3>
                            <ul class="list-group">
                                @foreach($user->courses as $corso)
                                    <li class="list-group-item d-flex justify-content-between align-items-center 
                                        @if($corso->pivot->state === 'Pending')
                                            border-warning 
                                        @elseif($corso->pivot->state === 'Approved')
                                            border-success
                                        @elseif($corso->pivot->state === 'Rejected')
                                            border-danger
                                        @endif
                                        {{$corso->pivot->state === Auth::user()->id ? 'bg-body-secondary' : ''}}">
                                        <p><b>Corso di: </b>{{$corso->name}}</p>

                                        <p><a href="/bookings/{{$corso->pivot->id}}" class="btn btn-outline-dark">Vedi iscrizione</a></p>
                                    </li>
                                @endforeach

                            </ul>
                        @else
                            Nessuna iscrizione
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>

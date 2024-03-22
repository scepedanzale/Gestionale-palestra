<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h1 class="fs-1 fw-bolder uppercase">
                {{ __('iscrizione: '. $booking->course->name) }}
            </h1>
        </div>

    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <!-- informazioni utente -->
                    @if(Auth::user()->admin)
                        <div class="mb-4">
                            <h3 class="fs-2 mb-2">Info Utente</h3>
                            <p><b>Nome corso:</b> {{$booking->user->firstname}} {{$booking->user->lastname}}</p>
                            <p><b>Email:</b> {{$booking->user->email}}</p>
                            <p><b>Data di iscrizione:</b> €{{$booking->user->created_at}}</p>
                        </div>
                    @endif

                    <!-- informazioni corso -->
                    <div class="mb-4">
                        <h3 class="fs-2 mb-2">Info Corso</h3>
                        <p><b>Nome corso:</b> {{$booking->course->name}}</p>
                        <p><b>Descrizione:</b> {{$booking->course->description}}</p>
                        <p><b>Prezzo:</b> €{{$booking->course->price}}</p>
                    </div>

                    <!-- informazioni iscrizione -->
                    <div class="mb-4">
                        <h3 class="fs-2 mb-2">Info Iscrizione</h3>
                        <p><b>Giorno di partecipazione:</b> {{$booking->day}}</p>
                        <p><b>Orario:</b> {{$booking->start_time}}</p>
                        <p><b>Stato della domanda di iscrizione:</b>
                            @if($booking->state==='Pending')
                                <span>In attesa di approvazione...</span>
                            @elseif($booking->state==='Approved')
                                <span>Iscritto</span>
                            @elseif($booking->state==='Rejected')
                                <span>Domanda rifiutata</span>
                            @endif
                        </p>
                    </div>

                    <div class="mb-4 d-flex gap-3">
                        <!-- cancella iscrizione -->
                        <form action="/bookings/{{$booking->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger">Cancella Iscrizione</button>
                        </form>
                        @if(Auth::user()->admin)
                        <!-- modifica iscrizione -->
                                <a href="/bookings/{{$booking->id}}/edit" class="btn btn-outline-dark">Modifica Iscrizione</a>
                        <!-- approvazione domanda -->
                                <form action="/bookings/{{$booking->id}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="Approved" name="state">
                                    <input type="hidden" value="{{$booking->id}}" name="id">
                                    <input type="hidden" value="{{$booking->day}}" name="day">
                                    <input type="hidden" value="{{$booking->start_time}}" name="start_time">
                                    <button class="btn btn-outline-success
                                        @if($booking->state==='Approved')
                                            disabled
                                        @elseif($booking->state==='Rejected')
                                            d-none
                                        @else
                                            d-block
                                        @endif
                                    ">
                                        @if($booking->state==='Pending')
                                            Approva Domanda
                                        @elseif($booking->state=='Approved')
                                            Domanda Approvata
                                        @endif

                                    </button>
                                </form>
                        <!-- rifiuta domanda di iscrizione -->
                                <form action="/bookings/{{$booking->id}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" value="Rejected" name="state">
                                    <input type="hidden" value="{{$booking->id}}" name="id">
                                    <input type="hidden" value="{{$booking->day}}" name="day">
                                    <input type="hidden" value="{{$booking->start_time}}" name="start_time">
                                    <button class="btn btn-outline-dark
                                        @if($booking->state==='Approved')
                                            d-none
                                        @elseif($booking->state==='Rejected')
                                            disabled
                                        @else
                                            d-block
                                        @endif
                                    ">
                                        @if($booking->state==='Pending')
                                            Rifiuta Domanda
                                        @elseif($booking->state=='Rejected')
                                            Domanda Rifiutata
                                        @endif

                                    </button>
                                </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

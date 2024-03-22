<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h1 class="fs-1 fw-bolder uppercase">
                {{ __(Auth::user()->admin ? 'iscrizioni' : 'I tuoi corsi') }}
            </h1>
        </div>

    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Auth::user()->admin)
                <div class="bg-white d-flex justify-content-center sticky-top gap-3 mb-3 py-2">
                    <a href="#in-attesa" class="btn btn-outline-dark">IN ATTESA</a>
                    <a href="#approved" class="btn btn-outline-dark">APPROVATE</a>
                    <a href="#rejected" class="btn btn-outline-dark">RIFIUTATE</a>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container-fluid p-6 text-gray-900">
                    <div class="row">
                        <!-- tutte le iscrizioni -->
                        @if(Auth::user()->admin)
                            <ul id="in-attesa" class="list-group mb-3">
                                <h4 class="fw-bold fs-4 mb-2">In attesa</h4>
                                @foreach($bookings as $booking)
                                    @if($booking->state==='Pending')
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-warning">
                                            <p><b>{{$booking->user->firstname}} {{$booking->user->lastname}}: </b><span>{{$booking->course->name}}</span></p>
                                            <a href="/bookings/{{$booking->id}}" class="btn btn-outline-dark">Dettaglio</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul id="approved" class="list-group mb-3">
                                <h4 class="fw-bold fs-4 mb-2">Approvate</h4>
                                @foreach($bookings as $booking)
                                    @if($booking->state==='Approved')
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-success">
                                            <p><b>{{$booking->user->firstname}} {{$booking->user->lastname}}: </b><span>{{$booking->course->name}}</span></p>
                                            <a href="/bookings/{{$booking->id}}" class="btn btn-outline-dark">Dettaglio</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <ul id="rejected" class="list-group mb-3">
                                <h4 class="fw-bold fs-4 mb-2">Rifiutate</h4>
                                @foreach($bookings as $booking)
                                    @if($booking->state==='Rejected')
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-danger">
                                            <p><b>{{$booking->user->firstname}} {{$booking->user->lastname}}: </b><span>{{$booking->course->name}}</span></p>
                                            <a href="/bookings/{{$booking->id}}" class="btn btn-outline-dark">Dettaglio</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else

                        <!-- iscrizioni del singolo utente -->
                                @foreach(Auth::user()->courses as $corso)
                                    <li class="list-group-item mb-2 d-flex justify-content-between align-items-center">
                                        <b>{{$corso->name}}</b>
                                        @if($corso->pivot->state==='Pending')
                                            <span><i>In attesa di approvazione...</i></span>
                                        @elseif($corso->pivot->state==='Approved')
                                            <span><i>Iscritto</i></span>
                                        @elseif($corso->pivot->state==='Rejected')
                                            <span><i>Domanda rifiutata</i></span>
                                        @endif
                                        <a href="/bookings/{{$corso->pivot->id}}" class="btn btn-outline-dark">Dettaglio</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

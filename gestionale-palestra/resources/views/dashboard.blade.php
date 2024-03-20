<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h1 class="fs-1 fw-bolder uppercase">
                {{ __('Tutti i Corsi') }}
            </h1>
            <a href="/bookings" class="btn btn-outline-dark">I tuoi corsi</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="main overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container-fluid p-6 text-gray-900">
                    <div class="row">
                        @if($corsi)
                            @foreach($corsi as $corso)
                            <div class="col-12 col-md-6 col-xl-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                            <p class="card-title fw-bold fs-4">Corso di: {{$corso->name}}</p>
                                            <p class="fs-5 fw-bolder yw">€{{$corso->price}}</p>
                                        <div class="text-center">
                                            <a href="{{ route('bookings.create', ['id' => $corso->id]) }}" class="btn btn-outline-dark w-50 my-2">Vai al corso</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

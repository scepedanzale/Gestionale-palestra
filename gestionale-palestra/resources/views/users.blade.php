<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
            <h1 class="fs-1 fw-bolder uppercase">
                {{ __('Tutti gli utenti') }}
            </h1>
        </div>

    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="container-fluid p-6 text-gray-900">
                    <div class="row">
                        <ul class="list-group">
                            @foreach($users as $user)

                                <li class="list-group-item d-flex justify-content-between align-items-center {{$user->id === Auth::user()->id ? 'bg-body-secondary' : ''}}">
                                    <b>{{$user->firstname}} {{$user->lastname}}</b>

                                    <a href="/users/{{$user->id}}" class="btn btn-outline-dark">Vedi utente</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

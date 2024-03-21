<x-app-layout>
    <x-slot name="header">
        <h1 class="fs-1 fw-bolder uppercase">
            @if(Auth::user()->admin===1)
            {{ __('Corso: '.$corso->name) }}
            @else
            {{ __('Iscrizione al Corso: '.$corso->name) }}
            @endif
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <p><b>Nome corso:</b>  {{$corso->name}}</p>
                    <p><b>Descrizione:</b>  {{$corso->description}}</p>
                    <p><b>Prezzo:</b>  €{{$corso->price}}</p>

                    @if(Auth::user()->admin===1)
                        <div class="d-flex justify-content-center my-2 gap-3">
                            <a href="/courses/{{$corso->id}}/edit" class="btn btn-outline-dark">Modifica Corso</a>
                            <form action="/courses/{{$corso->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger">Elimina corso</button>
                            </form>
                        </div>
                    @else
                        <form action="/bookings" method="post">
                            @csrf
                            <input type="hidden" name="course_id" value="{{$corso->id}}">
                            <div>
                                <label for="day" class="form-label"><b>Giorno: </b></label>
                                <select id="day" name="day" class="rounded-2 form-select-sm">
                                    <option value="Lunedì">Lunedì</option>
                                    <option value="Martedì">Martedì</option>
                                    <option value="Mercoledì">Mercoledì</option>
                                    <option value="Giovedì">Giovedì</option>
                                    <option value="Venerdì">Venerdì</option>
                                    <option value="Sabato">Sabato</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="start_time"><b>Orario:</b></label>
                                <select id="start_time" name="start_time" class="rounded-2 form-select-sm">
                                    <option value="10:00">10:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="18:00">18:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div>
                            <span class="uppercase text-danger">Ogni corso ha una durata di 2 ore</span>
                            <div class="mt-3 text-center">
                                <button type="submit" class="btn btn-outline-dark">Invia domanda di iscrizione</button>
                            </div>
                        </form>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>

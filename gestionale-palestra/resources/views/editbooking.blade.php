

@if (Auth::user()->admin===0)
    @php
        redirect('/courses');
    @endphp
@endif

<x-app-layout>
    <x-slot name="header">
        <h1 class="fs-1 fw-bolder uppercase">
            {{ __('Modifica Iscrizione') }}
        </h1>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <p><b>Nome corso:</b>  {{$booking->course->name}}</p>
                    <p><b>Descrizione:</b>  {{$booking->course->description}}</p>
                    <p><b>Prezzo:</b>  €{{$booking->course->price}}</p>

                        <form action="/bookings/{{$booking->id}}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{$booking->id}}">
                            <input type="hidden" name="state" value="{{$booking->state}}">
                            <input type="hidden" name="created_at" value="{{$booking->created_at}}">
                            <div>
                                <label for="day" class="form-label"><b>Giorno: </b></label>
                                <select id="day" name="day" class="rounded-2 form-select-sm">
                                    <option value="Lunedì" @if ($booking->day === 'Lunedì') {{'selected'}}@endif>Lunedì</option>
                                    <option value="Martedì" @if ($booking->day === 'Martedì') {{'selected'}}@endif>Martedì</option>
                                    <option value="Mercoledì" @if ($booking->day === 'Mercoledì') {{'selected'}}@endif>Mercoledì</option>
                                    <option value="Giovedì" @if ($booking->day === 'Giovedì') {{'selected'}}@endif>Giovedì</option>
                                    <option value="Venerdì" @if ($booking->day === 'Venerdì') {{'selected'}}@endif>Venerdì</option>
                                    <option value="Sabato" @if ($booking->day === 'Sabato') {{'selected'}}@endif>Sabato</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="start_time"><b>Orario:</b></label>
                                <select id="start_time" name="start_time" class="rounded-2 form-select-sm">
                                    <option value="10:00" @if ($booking->start_time === '10:00:00') {{'selected'}}@endif>10:00</option>
                                    <option value="12:00" @if ($booking->start_time === '12:00:00') {{'selected'}}@endif>12:00</option>
                                    <option value="14:00" @if ($booking->start_time === '14:00:00') {{'selected'}}@endif>14:00</option>
                                    <option value="16:00" @if ($booking->start_time === '16:00:00') {{'selected'}}@endif>16:00</option>
                                    <option value="18:00" @if ($booking->start_time === '18:00:00') {{'selected'}}@endif>18:00</option>
                                    <option value="20:00" @if ($booking->start_time === '20:00:00') {{'selected'}}@endif>20:00</option>
                                </select>
                            </div>
                            <div class="mt-3 text-center">
                                <button type="submit" class="btn btn-outline-dark">Modifica</button>
                            </div>
                        </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>

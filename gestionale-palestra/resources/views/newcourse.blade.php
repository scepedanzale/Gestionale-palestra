
@if (Auth::user()->admin===0)
    @php
        redirect('/courses');
    @endphp
@endif

<x-app-layout>
    <x-slot name="header">
        <h1 class="fs-1 fw-bolder uppercase">
            {{ __('Creazione nuovo corso') }}
        </h1>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg">

                <div class="p-6 text-gray-900">

                        <form action="/courses" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Nome del corso" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control h-20" placeholder="Descrizione del corso" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="number" step="0.01" name="price" class="form-control" placeholder="Prezzo" min="80" required>
                            </div>
                            <div class="mb-3 text-center">
                                <button class="btn btn-outline-dark w-50">Crea</button>
                            </div>
                        </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>

@extends('layouts.admin')

@section('content')
    <h2 class="ps-1 py-3 m-0">Crea un nuovo progetto</h2>

    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>

    @include('partials.errors')

    <div class="container p-3 border border-2 border-primary rounded ">
        <form action="{{ route('admin.projects.store') }}" method="POST">
            <div class="row row-cols-2 flex-wrap">

                @csrf

                <div class="col">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Inserisci il titolo</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title') }}">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="type" class="fw-bold mb-2">Inserisci il tipo</label>
                        <select class="form-select" id="type" name="type_id">
                            <option value=""></option>
                            @foreach ($types as $type)
                                <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">Inserisci il contenuto</label>
                        <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <p class="fw-bold mb-2">Inserisci la tecnologia</p>
                        @foreach ($technologies as $technology)
                            <div class="form-check">
                                {{-- L'imput deve essere selezionato se l'id del tag è contenuto nell'harray old di technologies --}}
                                <input class="form-check-input" type="checkbox" name="technologies[]"
                                    value="{{ $technology->id }}" id="technology-{{ $technology->id }}"
                                    @checked(in_array($technology->id, old('technologies', [])))>
                                <label class="form-check-label" for="technology-{{ $technology->id }}">
                                    {{ $technology->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" type="submit">Invia</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

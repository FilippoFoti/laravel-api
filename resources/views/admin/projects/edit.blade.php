@extends('layouts.admin')

@section('content')
    <h2 class="ps-1 py-3">Modifica il progetto {{ $project->title }}</h2>

    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>

    @include('partials.errors')

    <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Titolo</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $project->title) }}">
        </div>

        <div class="mb-3">
            <label for="type" class="fw-bold">Tipo</label>
            <select class="form-select" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected($type->id == old('type_id', $project->type?->id)) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <h5>Tecnologie</h5>
            @foreach ($technologies as $technology)
                <div class="form-check">
                    {{-- al primo caricamento della pagina devo selezionare i checkbox che sono salvate del db, quindi ho collection.
                        se c'è un errore a lsubmit del bottone devo selezionare i checkbox selezionati dall'utente nella pagina precedente,
                         quindi ho harray preso da old  --}}
                    <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                        id="technology-{{ $technology->id }}" @checked( old('technologies') ? in_array($technology->id, old('technologies', [] )) : $project->technologies->contains($technology))>
                    <label class="form-check-label" for="technology-{{ $technology->id }}">
                        {{ $technology->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $project->content) }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
@endsection

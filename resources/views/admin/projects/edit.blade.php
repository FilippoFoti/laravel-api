@extends('layouts.admin')

@section('content')
    <h2 class="ps-1 py-3 m-0">Modifica il progetto {{ $project->title }}</h2>

    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>

    @include('partials.errors')

    <div class="container p-3 border border-2 border-primary rounded">
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
            <div class="row row-cols-2 flex-wrap">

                @csrf
                @method('PUT')

                <div class="col">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Titolo</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $project->title) }}">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="type" class="fw-bold mb-2">Tipo</label>
                        <select class="form-select" id="type" name="type_id">
                            <option value=""></option>
                            @foreach ($types as $type)
                                <option @selected($type->id == old('type_id', $project->type?->id)) value="{{ $type->id }}">{{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">Contenuto</label>
                        <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $project->content) }}</textarea>
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <p class="fw-bold mb-2">Tecnologia</p>
                        @foreach ($technologies as $technology)
                            <div class="form-check">
                                {{-- al primo caricamento della pagina devo selezionare i checkbox che sono salvate del db, quindi ho collection.
                            se c'è un errore a lsubmit del bottone devo selezionare i checkbox selezionati dall'utente nella pagina precedente,
                             quindi ho harray preso da old  --}}
                                <input class="form-check-input" type="checkbox" name="technologies[]"
                                    value="{{ $technology->id }}" id="technology-{{ $technology->id }}"
                                    @checked(old('technologies')
                                            ? in_array($technology->id, old('technologies', []))
                                            : $project->technologies->contains($technology))>
                                <label class="form-check-label" for="technology-{{ $technology->id }}">
                                    {{ $technology->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="image" class="form-label fw-bold">Immagine</label>
                        <input type="file" class="form-control" id="image" name="image">

                        {{-- Se il progetto ha l'immagine, la visulizzo --}}
                        @if ($project->image)
                            <div class="my-3">
                                <img width="300" src="{{ asset('storage/' . $project->image) }}"
                                    alt="{{ $project->title }}">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col d-flex align-items-end justify-content-end">
                    <div class="text-end">
                        <button class="btn btn-primary" type="submit">Invia</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

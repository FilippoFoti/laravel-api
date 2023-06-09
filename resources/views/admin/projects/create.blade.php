@extends('layouts.admin')

@section('content')
    <h2 class="ps-1 py-3">Crea un nuovo progetto</h2>

    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>

    @include('partials.errors')

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Inserisci il titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="type" class="fw-bold">Tipo</label>
            <select class="form-select" id="type" name="type_id">
                <option value=""></option>
                @foreach ($types as $type)
                    <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Inserisci il contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
@endsection

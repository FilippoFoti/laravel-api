@extends('layouts.admin')

@section('content')
    <h2 class="ps-1 py-3">Crea un nuovo progetto</h2>

    @include('partials.errors')

    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Inserisci il titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Inserisci il contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ old('content') }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
@endsection

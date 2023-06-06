@extends('layouts.admin')

@section('content')
    <h2 class="ps-1 py-3">Modifica il progetto {{ $project->title }}</h2>

    @include('partials.errors')

    <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $project->title) }}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenuto</label>
            <textarea class="form-control" id="content" name="content" rows="3">{{ old('content', $project->content) }}</textarea>
        </div>
        <button class="btn btn-primary" type="submit">Invia</button>
    </form>
@endsection

@extends('layouts.admin')

@section('content')
    <h2 class="ps-1 py-3">Tecnologia: {{ $technology->name }}</h2>

    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>

    <div>
        @forelse ($technology->projects as $project)
            <span class="fw-bold">
                <a href="{{ route('admin.projects.show', $project->slug) }}">
                    {{ $project->title }}
                </a>
            </span>
        @empty
            <span class="fw-bold">Nessun progetto presente</span>
        @endforelse
    </div>
@endsection

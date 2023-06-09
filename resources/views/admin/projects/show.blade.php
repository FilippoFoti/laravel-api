@extends('layouts.admin')

@section('content')
    <h1 class="ps-1 py-3">{{ $project->title }}</h1>
    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>
    <div class="text-end fw-bold">
        slug --> {{ $project->slug }}
    </div>
    <div class="mt-3 fw-bold">
        @if ($project->type)
            <span>Tipo: {{ $project->type->name }}</span>
        @else
            <span>Nessun tipo</span>
        @endif
    </div>
    <div class="mt-3 fw-bold">
        @forelse ($project->technologies as $technology)
            <span>Tecnologia: {{ $technology->name }} {{ $loop->last ? '' : ',' }}</span>
        @empty
            <span>Nessuna tecnologia</span>
        @endforelse
    </div>
    <p class="mt-3">{{ $project->content }}</p>
@endsection

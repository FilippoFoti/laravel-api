@extends('layouts.admin')

@section('content')
    <h1 class="ps-1 py-3 m-0">{{ $project->title }}</h1>

    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>

    <div class="container p-3 border border-2 border-primary rounded">
        <div class="text-end">
            <p><span class="fw-bold">slug --> </span>{{ $project->slug }}</p>
        </div>
        <div class="mt-3">
            @if ($project->type)
                <p><span class="fw-bold">Tipo: </span>{{ $project->type->name }}</p>
            @else
                <p><span class="fw-bold">Tipo: </span>Null</p>
            @endif
        </div>
        <div class="mt-3">
            @forelse ($project->technologies as $technology)
                <p><span class="fw-bold">Tecnologia: </span>{{ $technology->name }} {{ $loop->last ? '' : ',' }}</p>
            @empty
                <p><span class="fw-bold">Tecnologia: </span>Null</p>
            @endforelse
        </div>
        <p class="mt-3"><span class="fw-bold">Contenuto: </span>{{ $project->content }}</p>
    </div>
@endsection

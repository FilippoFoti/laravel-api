@extends('layouts.admin')

@section('content')
    <h1 class="text-center">{{ $project->title }}</h1>
    <div class="text-end">
        @if ($project->type)
            <span>Tipo: {{ $project->type->name }}</span>
        @else
            <span>Nessun tipo</span>
        @endif
        <br>
        {{ $project->slug }}
    </div>
    <div class="mt-3">
        @forelse ($project->technologies as $technology)
            <span>Tecnologia: {{ $technology->name }} {{ $loop->last ? '' : ',' }}</span>
        @empty
            <span>Nessuna tecnologia presente</span>
        @endforelse
    </div>
    <p class="mt-4">{{ $project->content }}</p>
@endsection

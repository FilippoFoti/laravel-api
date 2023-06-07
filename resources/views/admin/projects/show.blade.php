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
    <p class="mt-4">{{ $project->content }}</p>
@endsection

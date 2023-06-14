@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="ps-1 py-3 m-0">Oops! Pagina non trovata</h2>
        <div class="mt-4">
            <a class="btn btn-primary" href="{{ route('home')}}">Home</a>
            <a class="btn btn-success" href="{{ url()->previous() }}">Indietro</a>
        </div>
    </div>
@endsection

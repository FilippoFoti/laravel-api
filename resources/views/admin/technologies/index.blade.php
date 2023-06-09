@extends('layouts.admin')

@section('content')
    <h2 class="ps-1 py-3">Lista delle tecnologie</h2>

    <div class="text-end mb-2">
        <a href="{{ url()->previous() }}" class="btn btn-success">Indietro</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome</th>
                            {{-- <th scope="col"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                <th scope="row">{{ $technology->id }}</th>
                                <td>{{ $technology->name }}</td>
                                <td>
                                    <a href="{{ route('admin.technologies.show', $technology->slug) }}" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

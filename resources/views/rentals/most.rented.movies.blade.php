@extends('layouts.app')

@section('title', 'Filmes Mais Alugados')

@section('content')
    <div class="container">
        <h1>Filmes Mais Alugados</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Total de Aluguéis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mostRentedMovies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

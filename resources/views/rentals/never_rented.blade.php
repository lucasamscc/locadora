@extends('layouts.app')

@section('title', 'Filmes Nunca Alugados')

@section('content')
    <div class="container">
        <h1>Filmes Nunca Alugados</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Diretor</th>
                    <th>Ano</th>
                    <!-- Adicione mais colunas conforme necessário -->
                </tr>
            </thead>
            <tbody>
                @foreach ($neverRentedMovies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->director }}</td>
                        <td>{{ $movie->year }}</td>
                        <!-- Adicione mais colunas conforme necessário -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

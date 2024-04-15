@extends('layouts.app')

@section('title', 'Detalhes do Filme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>{{ $movie->title }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center mb-3">
                                @if($movie->poster)
                                <img src="{{ asset('posters/' . $movie->poster) }}" class="img-fluid" style="max-width: 100%;" alt="Poster do Filme">
                                @else
                                <p>Poster não disponível</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Título:</strong> {{ $movie->title }}</p>
                                    <p><strong>Ano de Lançamento:</strong> {{ $movie->year }}</p>
                                    <p><strong>Preço:</strong> R$ {{ number_format($movie->price, 2) }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Diretor:</strong> {{ $movie->director }}</p>
                                    <p><strong>Gênero:</strong> {{ $movie->genre }}</p>
                                    <p><strong>Disponível:</strong> {{ $movie->available ? 'Sim' : 'Não' }}</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <a href="{{ route('movies.index') }}" class="btn btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

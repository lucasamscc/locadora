@extends('layouts.app')

@section('title', 'Filmes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-center">Filmes</h1>
                    </div>
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert" id="success-alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert" id="error-alert">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        
                        <div class="col-md-12 mb-3"> <!-- Alterado para tamanho 12 -->
                            <form action="{{ route('movies.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Buscar por título do filme" value="{{ request()->query('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12"> <!-- Alterado para tamanho 12 -->
                            <a href="{{ route('movies.create') }}" class="btn btn-primary">Cadastrar Filme</a> <!-- Removida a classe btn-block -->
                        </div>
                        <table class="table mt-3"> <!-- Adicionada margem superior -->
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Diretor</th>
                                    <th>Ano</th>
                                    <th>Gênero</th>
                                    <th>Preço</th>
                                    <th>Disponível</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movies as $movie)
                                    <tr>
                                        <td>{{ $movie->title }}</td>
                                        <td>{{ $movie->director }}</td>
                                        <td>{{ $movie->year }}</td>
                                        <td>{{ $movie->genre }}</td>
                                        <td>{{ $movie->price }}</td>
                                        <td>{{ $movie->available ? 'Sim' : 'Não' }}</td>
                                        <td>
                                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente quer deletar esse registro?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            var successAlert = document.getElementById('success-alert');
            var errorAlert = document.getElementById('error-alert');
            if (successAlert) {
                successAlert.style.display = 'none';
            }
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
        }, 2000);
    </script>
@endsection

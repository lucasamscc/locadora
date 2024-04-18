@extends('layouts.app')

@section('title', 'Aluguéis')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-center">Aluguéis</h1>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('rentals.create') }}" class="btn btn-primary mb-3">Cadastrar Aluguel</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID do Aluguel</th>
                                    <th>Cliente</th>
                                    <th>Filme</th>
                                    <th>Data de Início</th>
                                    <th>Data de Fim</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $rental)
                                    <tr>
                                        <td>{{ $rental->id }}</td>
                                        <td>{{ $rental->client->name }}</td>
                                        <td>{{ $rental->movie->title }}</td>
                                        <td>{{ $rental->rent_date}}</td>
                                        <td>{{ $rental->return_date }}</td>
                                        <td>
                                            @if ($rental->status)
                                                <span>Encerrado</span>
                                            @else
                                                <span>Em andamento</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (!$rental->status)
                                                <form action="{{ route('rentals.close', $rental->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-warning">Encerrar</button>
                                                </form>
                                            @endif
                                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" style="display: inline-block;">
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
@endsection

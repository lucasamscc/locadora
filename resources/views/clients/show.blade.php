@extends('layouts.app')

@section('title', 'Detalhes do Cliente')

@section('content')
    <h1>Detalhes do Cliente</h1>

    <div class="card">
        <div class="card-header">
            <h5>{{ $client->name }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $client->name }}</p>
            <p><strong>Endereço:</strong> {{ $client->address }}</p>
            <p><strong>Telefone:</strong> {{ $client->phone }}</p>
            <a href="{{ route('clients.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection

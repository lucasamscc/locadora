@extends('layouts.app')

@section('title', 'Clientes Mais Ativos')

@section('content')
    <div class="container">
        <h1>Clientes Mais Ativos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome do Cliente</th>
                    <th>Total de Aluguéis</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mostActiveClients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->total_rentals }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Clientes')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title text-center">Clientes</h1>
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

                        <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Cadastrar Cliente</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Endereço</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                    <tr>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->address }}</td>
                                        <td>{{ $client->phone }}</td>
                                        <td>
                                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-info">Visualizar</a>
                                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display: inline-block;">
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

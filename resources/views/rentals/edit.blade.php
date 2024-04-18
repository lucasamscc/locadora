@extends('layouts.app')

@section('title', 'Editar Aluguel')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Aluguel') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rentals.update', $rental->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="client_id" class="col-md-4 col-form-label text-md-right">{{ __('Cliente') }}</label>
                                <div class="col-md-6">
                                    <select name="client_id" id="client_id" class="form-control @error('client_id') is-invalid @enderror" required>
                                        <option value="">Selecione o cliente</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ $rental->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="film_id" class="col-md-4 col-form-label text-md-right">{{ __('Filme') }}</label>
                                <div class="col-md-6">
                                    <select name="film_id" id="film_id" class="form-control @error('film_id') is-invalid @enderror" required>
                                        <option value="">Selecione o filme</option>
                                        @foreach($movies as $movie)
                                            <option value="{{ $movie->id }}" {{ $rental->film_id == $movie->id ? 'selected' : '' }}>{{ $movie->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('film_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Data de Início') }}</label>
                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $rental->start_date }}" required>
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Data de Fim') }}</label>
                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $rental->end_date }}" required>
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Atualizar') }}
                                    </button>
                                    <a href="{{ route('rentals.index') }}" class="btn btn-secondary">
                                        {{ __('Cancelar') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

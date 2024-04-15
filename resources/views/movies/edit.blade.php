@extends('layouts.app')

@section('title', 'Editar Filme')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Filme') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('movies.update', $movie->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $movie->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="director" class="col-md-4 col-form-label text-md-right">{{ __('Diretor') }}</label>

                                <div class="col-md-6">
                                    <input id="director" type="text" class="form-control @error('director') is-invalid @enderror" name="director" value="{{ $movie->director }}" required autocomplete="director">

                                    @error('director')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Ano') }}</label>

                                <div class="col-md-6">
                                    <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $movie->year }}" required autocomplete="year">

                                    @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Gênero') }}</label>

                                <div class="col-md-6">
                                    <input id="genre" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{ $movie->genre }}" required autocomplete="genre">

                                    @error('genre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Preço') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $movie->price }}" required autocomplete="price">

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="available" class="col-md-4 col-form-label text-md-right">{{ __('Disponível') }}</label>

                                <div class="col-md-6">
                                    <select id="available" class="form-control @error('available') is-invalid @enderror" name="available" required>
                                        <option value="1" {{ $movie->available ? 'selected' : '' }}>Sim</option>
                                        <option value="0" {{ !$movie->available ? 'selected' : '' }}>Não</option>
                                    </select>

                                    @error('available')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="poster" class="col-md-4 col-form-label text-md-right">{{ __('Poster') }}</label>

                                <div class="col-md-6">
                                    <input id="poster" type="file" class="form-control-file @error('poster') is-invalid @enderror" name="poster">

                                    @error('poster')
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

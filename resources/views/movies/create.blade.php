@extends('layouts.app')

@section('title', 'Cadastro de Filme')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Cadastro de Filme</div>
                <div class="card-body">
                    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Título do Filme</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Título do Filme">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="director">Diretor</label>
                            <input type="text" class="form-control @error('director') is-invalid @enderror" id="director" name="director" placeholder="Diretor do Filme">
                            @error('director')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="year">Ano de Lançamento</label>
                            <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" placeholder="Ano de Lançamento">
                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="genre">Gênero</label>
                            <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" name="genre" placeholder="Gênero do Filme">
                            @error('genre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Preço</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Preço do Filme">
                            </div>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="poster">Poster do Filme</label>
                            <input type="file" class="form-control-file @error('poster') is-invalid @enderror" id="poster" name="poster">
                            @error('poster')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar Filme</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

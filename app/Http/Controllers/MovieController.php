<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    // Método para exibir o formulário de criação de filme
    public function create()
    {
        return view('movies.create');
    }

    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    // Método para armazenar um novo filme
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'tittle' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Criação do filme no banco de dados
        Movie::create($request->all());

        // Redirecionamento após criar o filme
        return redirect()->route('movies.index');
    }

    // Método para exibir os detalhes de um filme específico
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    // Método para excluir um filme
    public function destroy(Movie $movie)
    {
        $movie->delete();

        // Redirecionamento após excluir o filme
        return redirect()->route('movies.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
    * Retorna a view para cadastro de um filme
    */
    public function create()
    {
        return view('movies.create');
    }

    /**
    * Retorna a view da aba Filmes, listando todos
    */
    public function index(Request $request)
    {
        $search = $request->query('search');

        // Se houver uma consulta de pesquisa, filtre os filmes
        if ($search) {
            $movies = Movie::where('title', 'like', '%' . $search . '%')->get();
        } else {
            // Caso contrário, obtenha todos os filmes
            $movies = Movie::all();
        }

        return view('movies.index', compact('movies'));
    }

    /**
    * Valida os dados recebidos para criação de um filme e retorna a view com os dados dos filmes
    */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'year' => 'required|integer',
            'genre' => 'required|string|max:255',
            'price' => 'required|numeric',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Salvar imagem no sistema de arquivos
        $posterName = $request->file('poster')->getClientOriginalName();
        $request->file('poster')->move(public_path('posters'), $posterName);

        // Salvar nome do arquivo no banco de dados
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->director = $request->director;
        $movie->year = $request->year;
        $movie->genre = $request->genre;
        $movie->price = $request->price;
        $movie->poster = $posterName;
        $movie->save();
        
        return redirect()->route('movies.index')->with('success', 'Filme cadastrado com sucesso!');
    }

    // Método para exibir os detalhes de um filme específico
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Retorna a view que edita os dados de um cliente
     */
    public function edit(Movie $movie): \Illuminate\View\View
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Valida e atualiza os dados de um filme
     */
    public function update(Request $request, Movie $movie): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'year' => 'required|integer',
            'genre' => 'required|string|max:255',
            'price' => 'required|numeric',
            'poster' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Remova a obrigatoriedade do campo poster
        ]);
    
        // Apenas atualize os campos que foram preenchidos no formulário
        $data = [
            'title' => $request->input('title'),
            'director' => $request->input('director'),
            'year' => $request->input('year'),
            'genre' => $request->input('genre'),
            'price' => $request->input('price'),
        ];
    
        // Se um novo poster foi enviado, atualize-o
        if ($request->hasFile('poster')) {
            $posterPath = $request->file('poster')->store('posters');
            $data['poster'] = $posterPath;
        }
    
        $movie->update($data);
    
        return redirect()->route('movies.index')->with('success', 'Filme atualizado com sucesso!');
    }
    

    // Método para excluir um filme
    public function destroy(Movie $movie)
    {
        $movie->delete();

        // Redirecionamento após excluir o filme
        return redirect()->route('movies.index');
    }
}

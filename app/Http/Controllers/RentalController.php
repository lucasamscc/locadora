<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;
use App\Models\Movie;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class RentalController extends Controller
{
    /**
     * Método para exibir o formulário de criação de aluguel
     */
    public function create()
    {
        // Buscar apenas os filmes disponíveis para aluguel
        $movies = Movie::where('available', true)->get();
        
        $clients = Client::all();
        
        return view('rentals.create', compact('clients', 'movies'));
    }

    public function index()
    {
        // Carregar os aluguéis com os relacionamentos 'client' e 'movie' para evitar erros de "property on null"
        $rentals = Rent::with('client', 'movie')->get();
        return view('rentals.index', compact('rentals'));
    }
    
    /**
     * Valida os dados recebidos para criação de um aluguel e retorna a view com os dados dos aluguéis
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'film_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        
        $rent = new Rent();
        $rent->client_id = $request->client_id;
        $rent->film_id = $request->film_id;
        $rent->rent_date = $request->start_date;
        $rent->return_date = $request->end_date;
        $rent->save();
        
        $movie = Movie::find($request->film_id);
        $movie->available = false;
        $movie->save();
        
        return redirect()->route('rentals.index')->with('success', 'Aluguel cadastrado com sucesso!');
    }

    /**
    * Método para exibir os detalhes de um aluguel específico 
    */ 
    public function show(Rent $rental)
    {
        return view('rentals.show', compact('rental'));
    }

    /**
     * Método para encerrar um aluguel
     */ 
    public function close(Rent $rental)
    {
        $rental->status = true; // Alterando o status para encerrado
        $rental->save();

        $movie = $rental->movie;
        $movie->available = true;
        $movie->save();

        return redirect()->route('rentals.index')->with('success', 'Aluguel encerrado com sucesso!');
    }

    /**
    * Método para excluir um aluguel
    */ 
    public function destroy(Rent $rental)
    {
        $movie = $rental->movie;
        $rental->delete();
        $movie->available = true;
        $movie->save();

        return redirect()->route('rentals.index');
    }

    public function mostRentedMovies()
    {
        $mostRentedMovies = Rent::select('movies.title', 'movies.id', DB::raw('count(*) as total'))
            ->join('movies', 'rentals.film_id', '=', 'movies.id')
            ->groupBy('movies.id', 'movies.title')
            ->orderByDesc('total')
            ->limit(10)
            ->get();
    
        return $mostRentedMovies;
    }    

    public function neverRentedMovies()
{
    // Encontre os IDs dos filmes nunca alugados
    $neverRentedMovieIds = Movie::whereNotIn('id', function($query) {
        $query->select('film_id')->from('rentals');
    })->pluck('id');

    // Encontre os detalhes dos filmes nunca alugados
    $neverRentedMovies = Movie::whereIn('id', $neverRentedMovieIds)->get();

    return $neverRentedMovies;
}

}

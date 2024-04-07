<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rent;

class RentalController extends Controller
{
    // Método para exibir o formulário de criação de aluguel
    public function create()
    {
        // Aqui você pode retornar a view para o formulário de criação de aluguel
    }

    public function index()
    {
        $rentals = Rent::all();
        return view('rentals.index', compact('rentals'));
    }

    // Método para armazenar um novo aluguel
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([

            // Defina suas regras de validação conforme necessário
        ]);

        // Criação do aluguel no banco de dados
        Rent::create($request->all());

        // Redirecionamento após criar o aluguel
        return redirect()->route('rentals.index');
    }

    // Método para exibir os detalhes de um aluguel específico
    public function show(Rent $rental)
    {
        return view('rentals.show', compact('rental'));
    }

    // Método para excluir um aluguel
    public function destroy(Rent $rental)
    {
        $rental->delete();
        return redirect()->route('rentals.index');
    }
}

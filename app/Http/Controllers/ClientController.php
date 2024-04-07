<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    // Método para exibir o formulário de criação de cliente
    public function create()
    {
        return view('clients.create');
    }

    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // Método para armazenar um novo cliente
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            // Adicione outras regras de validação conforme necessário
        ]);

        // Criação do cliente no banco de dados
        Client::create($request->all());

        // Redirecionamento após criar o cliente
        return redirect()->route('clients.index');
    }

    // Método para exibir os detalhes de um cliente específico
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    // Método para excluir um cliente
    public function destroy(Client $cliente)
    {
        $cliente->delete();

        // Redirecionamento após excluir o cliente
        return redirect()->route('clients.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    /**
     * Retorna a view para cadastro de um cliente
     */
    public function create(): \Illuminate\View\View
    {
        return view('clients.create');
    }

    /**
     * Retorna a view da aba Clientes, listando todos
     */
    public function index(): \Illuminate\View\View
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Valida os dados recebidos para criação de um cliente e retorna a view com os dados dos clientes
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);
    
        $client = new Client();
        $client->name = $request->name;
        $client->address = $request->address;
        $client->phone = $request->phone;
        $client->save();
    
        return redirect()->route('clients.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    /** 
     * Retorna a view que exibe os dados de um cliente
     */
    public function show(Client $client): \Illuminate\View\View
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Retorna a view que edita os dados de um cliente
     */
    public function edit(Client $client): \Illuminate\View\View
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Valida e atualiza os dados de um cliente
     */
    public function update(Request $request, Client $client): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ]);

        $client->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('clients.index')->with('success', 'Cliente atualizado com sucesso!');
    }
    
    /**
     * Realiza a exclusão de um cliente e retorna para a view de clientes
     */
    public function destroy(Client $client): \Illuminate\Http\RedirectResponse
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente excluído com sucesso!');
    }

}

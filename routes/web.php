<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// rotas do cliente

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');

Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');

Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');

Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

// rotas dos filmes

Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');

Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

// rotas dos alugueis

Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');

Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create');

Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');

Route::get('/rentals/{rental}', [RentalController::class, 'show'])->name('rentals.show');

Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])->name('rentals.destroy');

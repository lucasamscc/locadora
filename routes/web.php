<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');    

/**
 * Rotas do Cliente
 */
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::get('/most-active', [ClientController::class, 'mostActiveClients'])->name('clients.most_active');
Route::patch('/clients/{client}/', [ClientController::class, 'update'])->name('clients.update'); 
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

/**
 * Rota do Filme
 */
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::patch('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

/**
 * Rotas do Alu guel
 */
Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');
Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create');
Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store');
Route::get('/rentals/{rental}', [RentalController::class, 'show'])->name('rentals.show');
Route::get('/most-rented-movies', [RentalController::class, 'mostRentedMovies'])->name('most.rented.movies');
Route::get('/never-rented-movies', [RentalController::class, 'neverRentedMovies'])->name('never.rented.movies');
Route::post('/rentals/{rental}/close', [RentalController::class, 'close'])->name('rentals.close');
Route::patch('/rentals/{rental}', [RentalController::class, 'update'])->name('rentals.update');
Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])->name('rentals.destroy');


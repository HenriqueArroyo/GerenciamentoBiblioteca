<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LivrosController;

// Rota para exibir a homePage
Route::get('',function(){
    return view('');
});

// Rota para exibir o formulário de login
Route::get('/login', [UsuarioController::class, 'showLoginForm'])->
name('usuarios.login');

// Rota para processar o login
Route::post('/login', [UsuarioController::class, 'login'])->
name('usuarios.login');

// Rota para exibir o formulário de registro
Route::get('/registro', [UsuarioController::class, 'showRegistroForm'])->
name('usuarios.registro');

// Rota para processar o registro
Route::post('/registro', [UsuarioController::class, 'registro'])->
name('usuarios.registro');

// Rota para logout
Route::post('/logout', [UsuarioController::class, 'logout'])->
name('usuarios.logout');

// Rota para o dashboard, protegida por autenticação
Route::get('/dashboard', function () {
    return view('usuarios.dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/admindashboard', function () {
    return view('admin.dashboard');
});



Route::get('/livros', [LivrosController::class, 'index'])->name('livros.index');
Route::get('/livros/add', [LivrosController::class, 'showAddForm'])->name('livros.add');
Route::post('/livros/store', [LivrosController::class, 'store'])->name('livros.store');
Route::get('/livros/edit/{id}', [LivrosController::class, 'edit'])->name('livros.edit');
Route::post('/livros/update/{id}', [LivrosController::class, 'update'])->name('livros.update');
Route::delete('/livros/delete/{id}', [LivrosController::class, 'destroy'])->name('livros.destroy');
Route::get('/loja', [LivrosController::class, 'loja'])->name('livros.loja');
Route::get('/', [LivrosController::class, 'loja'])->name('livros.loja');



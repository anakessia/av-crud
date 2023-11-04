<?php

use App\Http\Controllers\AuthxController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/******** AUTENTICAÇÃO ********/
//LOGIN
Route::get('/login', function(){ return view('auth.login'); });
Route::post('/auth/login', [AuthxController::class, 'authLogin']);


//CADASTRO
Route::get('/cadastro', function(){ return view('auth.cadastro'); });
Route::post('/auth/cadastro', [AuthxController::class, 'authCadastro']);

//SAIR
Route::get('/logout', [AuthxController::class, 'logout']);



/******** USER ********/
Route::get('/user/{id}', [UserController::class, 'indexPerfil']);

//HOME
Route::get('/', [ProdutoController::class, 'indexHome']);

//PRODUTOS
Route::post('/produtos/cadastrar', [ProdutoController::class, 'cadastrar_produto']);
Route::post('/produtos/alterar', [ProdutoController::class, 'alterar_produto']);
Route::post('/produtos/alterarfoto', [ProdutoController::class, 'alterar_foto_produto']);
Route::get('/produtos/deletar/{id}', [ProdutoController::class, 'delete_produto']);



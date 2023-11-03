<?php

use App\Http\Controllers\AuthxController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/********HOME********/
Route::get('/home', [UserController::class, 'indexHome']);

/********AUTENTICAÇÃO********/
//LOGIN
Route::get('/login', function(){ return view('auth.login'); });
Route::post('/auth/login', [AuthxController::class, 'authLogin']);

//CADASTRO
Route::get('/cadastro', function(){ return view('auth.cadastro'); });
Route::post('/auth/cadastro', [AuthxController::class, 'authCadastro']);


/********USER PERFIL********/
Route::get('/user/{id}', [UserController::class, 'indexPerfil']);
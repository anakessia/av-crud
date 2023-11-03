<?php

use App\Http\Controllers\AuthxController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/********AUTENTICAÇÃO********/
//LOGIN
Route::get('/login', [AuthxController::class, 'indexLogin']);
Route::post('/auth/login', [AuthxController::class, 'authLogin']);

//CADASTRO
Route::get('/cadastro', [AuthxController::class, 'indexCadastro']);
Route::post('/auth/cadastro', [AuthxController::class, 'authCadastro']);


/********USER PERFIL********/
Route::get('/user/{id}', [UserController::class, 'indexPerfil']);
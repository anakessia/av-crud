<?php

use App\Http\Controllers\AuthxController;
use Illuminate\Support\Facades\Route;


/********AUTENTICAÇÃO********/
//LOGIN
Route::get('/login', [AuthxController::class, 'indexLogin']);
#Route::post('/auth/login', [AuthxController::class, 'authLogin']);

//CADASTRO
Route::get('/cadastro', [AuthxController::class, 'indexCadastro']);
#Route::post('/auth/cadastro', [AuthxController::class, 'authCadastro']);
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthxController extends Controller
{
   //VIEW LOGIN
   public function indexLogin(){ return view('/auth/login'); }

   //VIEW CADASTRO
   public function indexCadastro(){ return view('/auth/cadastro'); }

   //-------------LOGIN---------------/
}

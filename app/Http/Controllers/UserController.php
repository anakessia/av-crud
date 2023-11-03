<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //VIEW HOME
    public function indexHome(){ 
        
        if(Auth::user()){
             # exibe produtos somente do usuarios logado
             $produtos = Produto::where('user_id', Auth::user()->id)->get();

             if($produtos->count() > 0){
                 return view('home', ['produtos' => $produtos]); 
             }
             
             return view('home');
        }else{
            return view('auth/login');
        }
    }

    //VIEW PERFIL
    public function indexPerfil($id){

        $user = User::where('id', $id)->first();

        if($user->count() > 0){
            return view('/user/perfil', ['user' => $user]);
        }
        
        return view('404');
    }
}

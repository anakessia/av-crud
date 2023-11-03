<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //VIEW HOME
    public function indexHome(){ 
        
        #get produtos do usuario

        return view('home'); 
    }

    //VIEW PERFIL
    public function indexPerfil($id){

        $user = User::where('id', $id)->first();

        if($user){
            return view('/user/perfil', ['user' => $user]);
        }else {
            return view('404');
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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

<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //VIEW PERFIL
    public function indexPerfil($id){

        $user = User::where('id', $id)->first();

        if($user->count() > 0){
            return view('/user/perfil', ['user' => $user]);
        }
        
        return view('404');
    }
}

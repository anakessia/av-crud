<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthxController extends Controller
{
   //-------------LOGIN---------------/
   public function authLogin(Request $request){

      $user = User::where('email', $request->email)->First();
      if ($user) {

          if (Hash::check($request->password, $user->password))  {//valida senha
              Auth::login($user); // autentica o usuário
              return redirect('/user/'.Auth::user()->id);
          }
          
          return back()->with('error', 'Crendenciais inválidas');
          
      }

      return back()->with('error', 'Crendenciais inválidas');
   }

   //-------------CADASTRO---------------/
   public function authCadastro(Request $request){
      if(!empty($request)){

         //VERIFICA EMAIL
         if (User::where('email', $request->email)->First()) {
            return back()->with('error', 'O email ('.$request->email.') já existe!');
         }
         
         //VALIDA SENHA
         if ($request->password != $request->password_confirmation) {    
            return back()->with('error', 'Confirmação de senha não confere');
         }

         //VERIFICA SE O ID JÁ EXISTE NO BANCO
         do {
            $randomNumber = '';
            for ($i = 0; $i < 6; $i++) {
               $randomNumber .= strval(random_int(0, 9));
            }
         } while (User::where('id', $randomNumber)->exists());

         //CRIAR USUÁRIO
         $user = new User;
         $user->id = $randomNumber;
         $user->email = $request->email;
         $user->full_name = $request->full_name; 
         $user->foto = 'new-user.png'; 
         $user->password = Hash::make($request->password);

         $user->save();

         Auth::login($user);

         return  redirect('/user/'.Auth::user()->id);

      }else{

          return back()->with('error', 'Erro ao fazer cadastro');

      }
   }


   //-------------SAIR---------------/
   public function logout(){
      Auth::logout();
      return redirect('/');
  }
}

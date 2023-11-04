<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProdutoController extends Controller
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

    //CADASTRAR PRODUTO
    public function cadastrar_produto(Request $request){

        if (strlen($request->titulo) > 200) {
            return back()->with('error','Titulo muito grande (max: 500 caracteres).');
        }

        //SALVA FOTO
        $requestFoto = $request->foto;
        $extension = $requestFoto->extension();
        $fotoName = md5($requestFoto->getClientOriginalName().strtotime('now')).".".$extension;
        $requestFoto->move(public_path('img/produtos/'), $fotoName);

        //INSERE PRODUTO
        $produto = new Produto;
        $produto->user_id = Auth::user()->id;
        $produto->foto = $fotoName;
        $produto->titulo = $request->titulo;
        $produto->descricao = $request->descricao;
        $produto->qtd_estoque = $request->qtd_estoque;
        $produto->save();

        return back()->with('success', "Seu produto foi inserido com sucesso ");

    }

    //ALTERAR FOTO PRODUTO
    public function alterar_foto_produto(Request $request){
        if(!empty($request->all())){
            
            //SALVA FOTO
            $requestFoto = $request->foto;
            $extension = $requestFoto->extension();
            $fotoName = md5($requestFoto->getClientOriginalName().strtotime('now')).".".$extension;
            $requestFoto->move(public_path('img/produtos/'), $fotoName);

            $update = Produto::where('id', $request->id)
                            ->update([
                                'foto'=> $fotoName,
                            ]);
            
            #dados do produto
            $produto = Produto::where('id', $request->id)->first();
    
            if ($update) {
                return back()->with('success', "A foto do produto ($produto->titulo) foi alterada com sucesso ");
            }else {
                return back()->with('error', "Error ao atualizar o produto ($produto->titulo)");
            }
            
        }
    }

    //ALTERAR PRODUTO
    public function alterar_produto(Request $request){
        if(!empty($request->all())){
    
            $update = Produto::where('id', $request->id)
                            ->update([
                                'titulo'=> $request->titulo, 
                                'descricao' => $request->descricao,
                                'qtd_estoque' => $request->qtd_estoque
                            ]);

            if ($update) {
                return back()->with('success', "O produto ($request->titulo) foi alterado com sucesso ");
            }else {
                return back()->with('error', "Error ao atualizar o produto ($request->titulo)");
            }
            
        }
    }

    //EXCLUIR PRODUTO
    public function delete_produto($id){

        if(Produto::where("id", $id)->delete()){
            return back()->with('success', "Produto excluido com sucesso");
        }else{
            return back()->with('error', "Error ao deletar produto");
        }
       
    }
}

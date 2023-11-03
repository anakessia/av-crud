<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProdutoController extends Controller
{
    //CADASTRAR PRODUTO
    public function cadastrar_produto(Request $request){

        if (strlen($request->titulo) > 200) {
            return back()->with('error','Titulo muito grande (max: 500 caracteres).');
        }

        //SALVA LOGO
        $requestFoto = $request->foto;
        $extension = $requestFoto->extension();
        $logoName = md5($requestFoto->getClientOriginalName().strtotime('now')).".".$extension;
        $requestFoto->move(public_path('img/produtos/'), $logoName);

        //INSERE PRODUTO
        $produto = new Produto;
        $produto->user_id = Auth::user()->id;
        $produto->foto = $logoName;
        $produto->titulo = $request->titulo;
        $produto->descricao = $request->descricao;
        $produto->qtd_estoque = $request->qtd_estoque;
        $produto->save();

        return back()->with('success', "O produto ($request->nome) foi inserido com sucesso ");

    }

    //ALTERAR PRODUTO
    public function update_product(Request $request){
        if(!empty($request->all())){
    
            $update = Produto::where('id', $request->id)
                            ->update([
                                'foto' => $request->logo,
                                'titulo'=> $request->titulo, 
                                'descricao' => $request->descricao,
                                'qtd_estoque' => $request->qtd_estoque
                            ]);

            if ($update) {
                return back()->with('success', "O produto ($request->nome) foi alterado com sucesso ");
            }else {
                return back()->with('error', "Error ao atualizar o produto ($request->nome)");
            }
            
        }
    }

    //EXCLUIR PRODUTO
    public function delete_produto($id){

        if(Produto::where("id", $id)->delete()){
            return back()->with('success', "Deletou o produto $id");
        }else{
            return back()->with('error', "Error ao deletar produto $id");
        }
       
    }
}

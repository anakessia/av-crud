@extends('layouts.main')

@section('title', 'Home')

@section('content')

@if(session('success'))
    <div class="container alert alert-success text-center alert-dismissible" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
<div class="container alert alert-danger text-center" role="alert">
    {{ session('error') }}
</div>
@endif

@if (isset($produtos))
    <div class="container text-center pt-3 mt-5">
        <h1 class=" display-5 text-light">Lista de produtos</h1>
    </div>
    <div class="container able-responsive">
        <table class="table text-center text-light">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Qtd. Estoque</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Foto</th>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            
            <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->titulo }}</td>
                    <td>{{ number_format($produto->qtd_estoque, 0, '.', '.') }}</td>

                    <!-- VER DETALHES -->
                    <td class="text-center">
                        <a href="#" class="btn btn-success btn-sm btn_acao" data-bs-toggle="modal" data-bs-target="#verDTL{{$produto->id}}">
                            <i class="bi bi-chat-left-text-fill"></i>
                        </a>
                        <!-- MODAL VER DETALHES -->
                        <div class="modal fade text-left" id="verDTL{{$produto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0 text-muted">
                                        <h3>Detalhes do produto:</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark pb-5">
                                        <p>{{ $produto->descricao }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <!-- VER IMAGEM -->
                    <td class="text-center">
                        <a href="#" class="btn btn-success btn-sm btn_acao" data-bs-toggle="modal" data-bs-target="#verIMG{{$produto->id}}">
                            <i class="bi bi-card-image"></i>
                        </a>
                        <!-- MODAL VER IMAGEM -->
                        <div class="modal fade text-left" id="verIMG{{$produto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0 text-muted">
                                        <h3>Foto do produto:</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark pb-5">
                                        <img id="output" width="100%" height="400" src="/img/produtos/{{$produto->foto}}" class="py-2" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>

                    <td>
                        <a href="#" class="btn btn-primary btn-sm btn_acao" data-bs-toggle="modal" data-bs-target="#alterarProduto{{$produto->id}}">
                            <i class="bi bi-pencil-square"></i> 
                        </a>
                    </td>

                    <td>
                        <a href="#" class="btn btn-danger btn-sm btn_acao" data-bs-toggle="modal" data-bs-target="#deletarProduto{{$produto->id}}"> 
                            <i class="bi bi-trash"></i> 
                        </a>
                    </td>    

                    <!-- MODAL DELETAR Produto -->
                    <div class="modal fade" id="deletarProduto{{$produto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Confirme se deseja deletar o produto {{$produto->titulo}}</p>
                                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                                        <a class="btn btn-danger" href="/produtos/deletar/{{$produto->id}}">Deletar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- MODAL ALTERAR Produto -->
                    <div class="modal fade text-left" id="alterarProduto{{$produto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-4">
                                        <form method="POST" action="/produtos/alterarfoto"  enctype="multipart/form-data">
                                            @csrf
                                            
                                            <input type="hidden" name="id" value="{{$produto->id}}">

                                            <!-- PREVIEW FOTO -->
                                            <div class="text-center">
                                                <div class="">
                                                    <img id="output{{$produto->id}}" width="100%" height="400" src="/img/produtos/{{$produto->foto}}" class=" py-2" >
                                                </div>
                                            </div>

                                            <div class="col-sm-12  mb-3">
                                                <label for="foto">Foto <span class="text-danger">*</span></label>
                                                <input id="foto" type="file" accept="image/png, image/gif, image/jpeg" class="form-control" name="foto" onchange="loadfile(event, 'output{{$produto->id}}')" autofocus required>
                                            </div>

                                            <button type="submit" class="w-100 btn btn-primary" data-bs-dismiss="modal">Alterar foto</button>
                                        </form>
                                    </div>

                                    <form method="POST" action="/produtos/alterar" enctype="multipart/form-data">
                                        @csrf
                                        
                                        <input type="hidden" name="id" value="{{$produto->id}}">

                                        <div class="col-sm-12 mb-3 ">
                                            <label for="titulo" class="text-left">Titulo <span class="text-danger">*</span></label>
                                            <input id="titulo" type="text" class="form-control" name="titulo" value="{{$produto->titulo}}" autofocus required>
                                        </div>

                                        <div class="col-sm-12 mb-3 text-left">
                                            <label for="descricao">Descrição <span class="text-danger">*</span></label>
                                            <input id="descricao" type="text" class="form-control" name="descricao" value="{{$produto->descricao}}" autofocus required>
                                        </div>

                                        <div class="col-sm-12 mb-3 text-left">
                                            <label for="qtd_estoque">Qtd. Estoque <span class="text-danger">*</span></label>
                                            <input id="qtd_estoque" type="number" class="form-control" name="qtd_estoque" value="{{$produto->qtd_estoque}}" autofocus required>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Alterar</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
        
        <div class="container text-center pt-3 mt-5">
            <a href="#" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#adicionarProduto">Adicione produtos</a>
        </div>
    </div>
@else
    <div class="container text-center pt-3 mt-5">
        <div class="container text-center p-3">
            <h1 class="text-light display-5">Voçê ainda tem produtos adicionados</h1>
        </div>
        <a href="#" class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#adicionarProduto">Adicione produtos</a>
    </div>
@endif


<!-- ADICIONAR Produto -->
<div class="modal fade text-left" id="adicionarProduto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/produtos/cadastrar"  enctype="multipart/form-data">
                    @csrf

                     <!-- PREVIEW FOTO -->
                     <div class="text-center">
                        <div class="">
                            <img id="outputadd" width="100%" height="400" src="/img/produtos/produto-sem-imagem.gif" class=" py-2" >
                        </div>
                    </div>
                    <div class="col-sm-12  mb-3">
                        <label for="foto">Foto <span class="text-danger">*</span></label>
                        <input id="foto" type="file" accept="image/png, image/gif, image/jpeg" class="form-control" name="foto" onchange="loadfile(event, 'outputadd')" autofocus required>
                    </div>

                    <div class="col-sm-12 mb-3 ">
                        <label for="titulo" class="text-left">Titulo <span class="text-danger">*</span></label>
                        <input id="titulo" type="text" class="form-control" name="titulo" autofocus required>
                    </div>

                    <div class="col-sm-12 mb-3 text-left">
                        <label for="descricao">Descrição <span class="text-danger">*</span></label>
                        <input id="descricao" type="text" class="form-control" name="descricao" autofocus required>
                    </div>

                    <div class="col-sm-12 mb-3 text-left">
                        <label for="qtd_estoque">Qtd. Estoque <span class="text-danger">*</span></label>
                        <input id="qtd_estoque" type="number" class="form-control" name="qtd_estoque" autofocus required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Adicionar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection
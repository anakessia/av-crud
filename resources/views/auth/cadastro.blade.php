@extends('../layouts.main_form')

@section('title', 'Cadastro')

@section('content')

<main class="form-signin text-light">
    
    <form method="POST" id="login" action="/auth/cadastro" class="ml-1" style="padding-top: 10px;" autocomplete="off">
        @csrf
        <h1 class="h3 mb-2 fst-italic fw-normal text-center">Cadastro</h1>

        @if(session('success'))
            <div class="container alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="container alert alert-danger text-center" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="row g-3">

            <div class="col-sm-12">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input id="email" class="form-control form-control-lg" name="email" type="email" placeholder="Digite seu email" aria-label=".form-control-lg" autofocus required>
            </div>

            <div class="col-sm-12">
                <label for="full_name">Nome completo <span class="text-danger">*</span></label>
                <input id="full_name" class="form-control form-control-lg" name="full_name" type="full_name" placeholder="Digite seu nome completo" aria-label=".form-control-lg" autofocus required>
            </div>

            <div class="col-sm-12">
                <label for="password">Senha <span class="text-danger">*</span></label>
                <input id="password" minlength="2" maxlength="10" class="form-control form-control-lg" name="password" type="password" placeholder="*********" aria-label=".form-control-lg" autofocus required>
            </div>

            <div class="col-sm-12">
                <label for="password-c">Confirme a Senha <span class="text-danger">*</span></label>
                <input id="password-c" minlength="2" maxlength="10" class="form-control form-control-lg" name="password_confirmation" type="password" placeholder="*********" aria-label=".form-control-lg" autofocus required>
            </div>
        </div>
        <button class="w-100 my-3 btn btn-lg btn-warning" type="submit">Cadastrar</button>

        <p class="text-center h5 mb-3 fst-italic fw-normal">Já tem uma conta ?<a href="/login" style="text-decoration: none;" class="text-warning"> Ir para login</a></p>
    </form>

</main>


@endsection
@extends('../layouts.main_form')

@section('title', 'Login')

@section('content')

<main class="form-signin text-light">
    
    <form method="POST" action="/auth/login" class="ml-1" style="padding-top: 40px;padding-bottom: 40px;">
        @csrf
        <h1 class="h3 mb-3 fst-italic fw-normal text-center">Login</h1>
        
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
                <label for="password">Senha <span class="text-danger">*</span></label>
                <input id="password" class="form-control form-control-lg" name="password" type="password" placeholder="*********" aria-label=".form-control-lg" autofocus required>
            </div>

        </div>
        <button class="w-100 my-3 btn btn-lg btn-warning" type="submit">Entrar</button>
    </form>

    <p class="text-center h5 mb-3 fst-italic fw-normal">Ainda não tem conta ? <a href="/cadastro" style="text-decoration: none;" class="text-warning">Cadastre-se</a></p>
</main>


@endsection
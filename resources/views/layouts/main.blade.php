<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/logo.png">
    <title>@yield('title')</title>

    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <!-- icon boostrap -->
    <link rel="stylesheet" href="https://icons.getbootstrap.com/assets/font/bootstrap-icons.min.css"><link rel="stylesheet" href="/assets/css/docs.css">
</head>
<body class="bg-dark">

    <header class="navbar navbar-expand-md nav-petplace fs-5">
        <nav class="container">
    
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="bi" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
    
        <div class="collapse navbar-collapse" id="bdNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
                <li><a class="nav-link px-2 text-white" href="/user/{{ Auth::user()->id }}">Meu perfil</a></li>
            </ul>
    
            <hr class="d-md-none text-dark-50">
    
            <ul class="navbar-nav flex-row flex-wrap ms-md-auto">
            <!-- Auth Links -->
            @guest
                <li class="nav-item col-6 col-md-auto">
                    <a class="btn btn-outline-warning"  href="/login">Login</a>
                    <a class="btn btn-warning" href="/cadastro">Cadastre-se</a>
                </li>
    
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class=" nav-link dropdown-toggle text-light " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> 
                        {{ Auth::user()->full_name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">Sair</a>
                    </div>
                </li>
            @endguest
            </ul>
    
        </div>
        </nav>
    </header>
    
    <div id="app">
        @yield('content')
    </div>

    <script src="/js/config.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
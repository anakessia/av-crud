@extends('../layouts.main')

@section('title', 'Perfil | '.$user->full_name)
@section('url', '/user/'.$user->id)


@section('content')
    <div class="container-fluid text-light text-center pt-5">

        <!-- RETURN -->
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

        <img src="/img/users/{{$user->foto}}" width="200" height="200" class="rounded-circle py-2">
        <h2>{{ $user->full_name }}</h2>
        <span class="text-white-50 mt-0"><i>ID: {{$user->id}}</i></span>
        <br>
        <span class="text-white-50 mt-0"><i>EMAIL: {{$user->email}}</i></span>

    </div>

<script src="/js/equipe-perfil.js"></script>
@endsection
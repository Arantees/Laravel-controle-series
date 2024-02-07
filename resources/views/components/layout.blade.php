<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: black">
        <div class="container-fluid d-flex">
            <div class="col-1">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="55" height="55">
            </div>

            <div class="col-9 d-flex">
                <a class="navbar-brand" href="{{ route('home.index') }}">Home</a>
                <a class="navbar-brand" href="{{ route('series.index') }}">Series</a>
                @auth
                <a class="navbar-brand" href="{{ route('series.create') }}">Add Series</a>
                @endauth
            </div>

            <div class="col-2">
                @auth
                    <a href="{{ route('logout') }}" class="ml-auto">Sair</a>
                @endauth

                @guest
                    <a href="{{ route('login.index') }}">Entrar</a>
                @endguest
            </div>
        </div>
    </nav>




    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <div class="container align-items-center mt-5">
        <h1 style="color: white">{{ $title }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ $slot }}
    </div>

</body>



</html>

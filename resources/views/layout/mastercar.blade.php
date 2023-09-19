<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.9.55/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <title>@yield("title")</title>
</head>
<body style="background-color: rgb(102, 102, 102)">
    <header>
        <nav class="navbar bg-dark">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand text-white bold" href="{{route('index')}}"><img style="height:80px"  src="images/logo.png" alt=""></a>
                </div>

                @if(session('utilisateur'))
                        <div class="d-grid gap-4 d-flex  justify-content-center ">
                            <p style="font-size: 18px;color:white;" class="mt-5">Bienvenue,<img class="bg-info" src="images/user.png" alt=""> {{ session('utilisateur')->email }}</p>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger m-5">Déconnexion</button>
                            </form>
                        </div>
                @else
                    <p>Non connecté</p>
                @endif
            </div>

        </nav>
    </header>
    @yield("buttons")
    <h2 class="text-white text-center mt-2">@yield("fieldtitle")</h2>
    <div class="me-3 ms-3">
        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error )
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield("form")

        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show text-center mt-2" role="alert">
                <strong>Message !</strong> <br> {{ session("message") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('deletemsg'))
            <div class="alert alert-danger alert-dismissible fade show text-center mt-2" role="alert">
                <strong>Message !</strong> <br> {{ session("deletemsg") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('updatemsg'))
            <div class="alert alert-success alert-dismissible fade show text-center mt-2" role="alert">
                <strong>Message !</strong> <br> {{ session("updatemsg") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="d-flex justify-content-center">
            @yield("table")
        </div>
    </div>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<div class="w3l-copy-right text-center">
     <p>© 2023 Gestion de voitures.Auteur GNANHOUNGBE Arsène et HOUANGNI yakid
        <a href="#" target="_blank"></a></p>
</div>
</body>
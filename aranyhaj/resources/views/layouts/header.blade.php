<!DOCTYPE html>
<html lang="en-hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
     crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/af0adec3b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>@yield("title")</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand" href="/"><img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                <a class="navbar-brand" href="/">Aranyhaj</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/donate">Adományozok</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about">Rólunk</a></li>
                        <li class="nav-item"><a class="nav-link" href="/events">Események</a></li>
                        <li class="nav-item"><a class="nav-link" href="/salons">Szalonok</a></li>

                        

                        <li class="nav-item"><a class="nav-link" href="/regist">Regisztráció</a></li>
                        <li class="nav-item"><a class="nav-link" href="/log">Belépés</a></li>

                        <li class="nav-item"><a class="nav-link" href="/user">Fiókom</a></li>
                        <a class="navbar-brand" href="/"><img id="logo" src="{{ asset('images/user.png') }}" alt="Logo"></a>

                        @auth
                            <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Logout</button>
                            </form>
                        @endauth
                    </ul>
                </div>

                
                <!--<a class="navbar-brand" href="/log"><img id="user" src="{{ asset('images/user.png') }}" alt="user"></a> -->
            </div>
        </nav>
    </header>
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
<header class="header">
        <nav class="container-md d-flex flex-column align-items-center">
            <!-- Top Section: Logo + Search + Profile -->
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex flex-grow-1 justify-content-center">
                    <a href="/"><img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                </div>
                <div class="d-flex align-items-center">
                    <!--div class="dropdown ms-3">
                        <img src="{{ asset('images/profil.png') }}" alt="Felhasználó" class="rounded-circle dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" height="35">
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li class="nav-item"><a class="dropdown-item" href="/regist">Regisztráció</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="/log">Profile</a></li>
                            <li class="nav-item"><button class="dropdown-item" type="submit">Kijelentkezés</button></li>
                            <li class="nav-item"><a class="dropdown-item" href="/user">Fiókom</a></li>
                        </ul>
                    </div-->
                    <div class="dropdown">
                        <img src="{{ asset('images/profil.png') }}" alt="Felhasználó" class="rounded-circle dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" height="35">
                        <div class="dropdown-content">
                        <a href="/log">Bejelentkezés</a>
                        <a href="/regist">Regisztráció</a>
                        <a href="/user">Fiókom</a>
                        <a class="nav-item"><button class="dropdown-item" type="submit">Kijelentkezés</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <!-- Bottom Section: Navigation Links -->
            <div class="container text-center" id="bottomHeader">
                <p><a href="/donate">Adományozok</a></p>
                <p><a href="/about">Rólunk</a></p>
                <p><a href="/events">Események</a></p>
                <p><a href="/salons">Szalonok</a></p>
            </div>
        </nav>
    </header> <br>
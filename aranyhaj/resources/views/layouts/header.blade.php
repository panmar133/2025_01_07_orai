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
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="d-flex flex-grow-1 justify-content-center">
                <a href="/"><img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo"></a>
            </div>
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <img src="{{ asset('images/profil.png') }}" alt="Felhasználó" class="rounded-circle dropdown-toggle" id="userDropdown" 
                        data-bs-toggle="dropdown" aria-expanded="false" height="35">
                        <div class="dropdown-content" id="dropdown-content">
                        @guest
                            <!-- Ha nincs bejelentkezve, akkor a bejelentkezés és regisztráció linkek jelennek meg -->
                            <a href="/log">Bejelentkezés</a>
                            <a href="/registration">Regisztráció</a>
                        @endguest

                        @auth
                        <!-- Ha be van jelentkezve, akkor a fiók link és kijelentkezés gomb jelennek meg -->
                        <a href="/user" class="btn dropdown-item">Fiókom</a>
                        <a href="/owner" class="btn dropdown-item">Szalontulajdonos felület</a>
                        <a href="/admin" class="btn dropdown-item">Admin felület</a>
                        <form action="{{ route('logout') }}" method="POST" class="d-flex" role="search">
                            @csrf
                            @method('DELETE')
                            <a><button id="button" class="btn dropdown-item" type="submit">Kijelentkezés</button></a>
                        </form>
                    @endauth
                    </div>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                    //Kép és a lenyíló fej deklarálása
                    let userDropdown = document.getElementById("userDropdown");
                    let dropdownContent = document.getElementById("dropdown-content");
                    //Képek deklarálása
                    let normalImg = "{{ asset('images/profil.png') }}";
                    let hoverImg = "{{ asset('images/aProfil.png') }}";
                    //Képre rámenés megváltozatása
                    userDropdown.addEventListener("mouseover", function() {this.src = hoverImg;});
                    userDropdown.addEventListener("mouseout", function() {this.src = normalImg;});
                    //Lenyílófej rámenés megváltozatása
                    dropdownContent.addEventListener("mouseover", function() {userDropdown.src = hoverImg;});
                    dropdownContent.addEventListener("mouseout", function() {userDropdown.src = normalImg;});
                    });
                </script>
            </div>
        </div><hr>
        <div class="container text-center" id="bottomHeader">
            <p><a href="/donate">Adományozók</a></p>
            <p><a href="/about">Rólunk</a></p>
            <p><a href="/events">Események</a></p>
            <p><a href="/salons">Szalonok</a></p>
        </div>
    </nav>
</header><br>
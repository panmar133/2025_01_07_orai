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
        <div class="d-flex flex-column align-items-center w-100">
            <a href="/" class="mb-3">
                <img id="logo" src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>
            <div class="d-flex align-items-center w-75 justify-content-center">
    <input type="text" class="form-control me-2 search-input" placeholder="Keresés">
    <button class="btn btn-search">
        <img src="{{ asset('images/search.png') }}" id="Search" alt="Kereső" width="35px">
    </button>
</div>

<div class="dropdown">
    <img src="{{ asset('images/profil.png') }}" alt="Felhasználó" class="rounded-circle dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" height="35">
    <div class="dropdown-content" id="dropdown-content">
        <a href="/log">Bejelentkezés</a>
        <a href="/registration">Regisztráció</a>
        <a href="/user">Fiókom</a>
        <a class="nav-item"><button class="dropdown-item" type="submit">Kijelentkezés</button></a>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Kép és a lenyíló menü deklarálása
        let userDropdown = document.getElementById("userDropdown");
        let dropdownContent = document.getElementById("dropdown-content");
        let searchImg = document.getElementById("Search");
        // Képek deklarálása
        let profil = "{{ asset('images/profil.png') }}";
        let hoverProfil = "{{ asset('images/aProfil.png') }}";
        let search = "{{ asset('images/search.png') }}";
        let hoverSearch = "{{ asset('images/aSearch.png') }}"; // Ellenőrizd, hogy ez helyes-e
        // Kép hover változtatás
        userDropdown.addEventListener("mouseover", function() {
            this.src = hoverProfil;
        });
        userDropdown.addEventListener("mouseout", function() {
            this.src = profil;
        });
        // Kereső kép hover változtatása
        searchImg.addEventListener("mouseover", function() {
            this.src = hoverSearch;
        });
        searchImg.addEventListener("mouseout", function() {
            this.src = search;
        });
        // Lenýíló menü hover változtatása
        dropdownContent.addEventListener("mouseover", function() {
            userDropdown.src = hoverProfil;
        });
        dropdownContent.addEventListener("mouseout", function() {
            userDropdown.src = profil;
        });
    });
</script>

        </div>
        </div>
        <!-- Bottom Section: Navigation Links -->
        <div class="container text-center" id="bottomHeader">
            <p><a href="/donate">Adományozok</a></p>
            <p><a href="/about">Rólunk</a></p>
            <p><a href="/events">Események</a></p>
            <p><a href="/salons">Szalonok</a></p>
        </div>
    </nav>
</header><br>
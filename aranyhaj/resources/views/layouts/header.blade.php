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
                        <li class="nav-item"><a class="nav-link" href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.tiktok.com"><i class="fa-brands fa-tiktok"></i> TikTok</a></li>
                    </ul>

                    <form action="/redirect" method="get">
                    <select name="select" class="form-select ms-3" onchange="this.form.submit()">
                        <option value="">-- Válassz --</option>
                        <option value="log">Regisztráció</option>
                        <option value="registration">Belépés</option>
                        <option value="user">Fiókom</option>
                        <option value="donate">Adományozok</option>
                        <option value="about">Rólunk</option>
                        <option value="events">Események</option>                                               
                    </select>
                </form>

                </div>
                <a class="navbar-brand" href="/login"><img id="user" src="{{ asset('images/user.png') }}" alt="user"></a>
            </div>
        </nav>
    </header>
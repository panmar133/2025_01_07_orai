<!DOCTYPE html>
<html lang="en-hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://kit.fontawesome.com/af0adec3b9.js" crossorigin="anonymous"></script>
    <title>@yield("title")</title>
</head>
<body>
    <header>
        <!-- Bal oldalt lévő cuccok -->
        <img src="" alt="ImALogo">
        <h1><a href="/">Aranyhaj</a></h1>

        <!-- Elöző két adat mellé, de picivel alrébb-->
        <a href="https://www.facebook.com"><i class="fa-brands fa-facebook"></i><p>Facebook</p></a>
        <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i><p>Instagram</p></a>
        <a href="https://www.tiktok.com"><i class="fa-brands fa-tiktok"></i><p>TikTok</p></a>

        <!-- A lenyíló gomb mellé balra, estei/napali mód -->
        <button><i class="fa-solid fa-circle-half-stroke"></i></button>

        <!-- Jobb oldalt lévő lenyíló fej -->
        <select name="dropDown" id="dropdown">
            <option value=""><a href="/user">Fiók</a></option>
            <option value=""><a href="/donate">Adományozok</a></option>
            <option value=""><a href="/about">Rólunk</a></option>
            <option value=""><a href="/events">Események</a></option>
        </select>
        </div>
    </header>

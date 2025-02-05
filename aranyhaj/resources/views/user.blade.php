@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Fiókom")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
    @auth    
        <h1 class="row justify-content-center">Fiókom</h1>
            <div id="userImage" class="row justify-content-center">
            <img src="{{ asset('images/user.png) }}" alt="Profilkép">    
            <p>Profilkép Módósítás</p>
            <input type="url" class="form-control" id="exampleInputUrl">
            <button type="submit" id="darkBrownButton" class="btn btn-secondary">Bejelentkezés</button>
        </div>   
        <div id="user" class="row justify-content-center">
            <h5>Felhasználó adatai:</h5>
            <h6>Felhasználó név: {{ $user->user_name }}</h6>
            <h6>Felhasználó rangja: {{ $user->admin }}</h6>
            <h6>Email cím: {{ $user->email }}</h6>
            <button type="submit" id="darkBrownButton" class="btn btn-secondary">Email cím megváltoztatása</button>
            <button type="submit" id="darkBrownButton" class="btn btn-secondary">Jelszó megváltoztatása</button>
            <button type="submit" id="darkBrownButton" class="btn btn-secondary">Lakcím megváltoztatása</button>
        </div>

    @endauth
</main>

@endsection
<!-- Lezárás -->
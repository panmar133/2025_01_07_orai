@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Fiókom")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
    <h1>Fiókom</h1>
    <div id="userImage">
        <img src="{{ asset('images/user.png') }}" alt="Profilkép">

        <p>Profilkép Módósítás</p>
        <input type="url" class="form-control" id="exampleInputUrl">
        <button type="submit" id="darkBrownButton" class="btn btn-secondary">Bejelentkezés</button>
    </div>   
    <div id="user">
        <h5>Felhasználó adatai:</h5>
        <h6>Felhasználó név: </h6>
        <h6>Email cím:</h6>
        <button type="submit" id="darkBrownButton" class="btn btn-secondary">Email cím megváltoztatása</button>
        <h6>Jelszó: </h6>
        <button type="submit" id="darkBrownButton" class="btn btn-secondary">Jelszó megváltoztatása</button>
        <button type="submit" id="darkBrownButton" class="btn btn-secondary">Lakcím megváltoztatása</button>
    </div>

</main>
@endsection
<!-- Lezárás -->
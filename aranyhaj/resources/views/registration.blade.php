@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Rólunk")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<h1>Register</h1>

<div id="register">
    <h5>Felhasználónév</h5>
    <input type="username" class="form-control" id="exampleInputUserName">
    <h5>E-mail cím</h5>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <h5>Lakcím</h5>
    <input type="adress" class="form-control" id="exampleInputAdress">
    <p>Ez a mező nem kötelező. A szalonok keresésében segít.</p>
    <h5>Jelszó</h5>
    <input type="password" class="form-control" id="exampleInputPassword1">

    <button type="submit" id="darkBrownButton" class="btn btn-secondary">Bejelentkezés</button>
</div>

@endsection
<!-- Lezárás -->
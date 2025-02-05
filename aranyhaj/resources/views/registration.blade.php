@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Rólunk")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<h1>Regisztráció</h1>

<div id="register">
    <h5>Felhasználónév</h5>
    <input type="username" placeholder="Felhasználó név"  class="form-control" id="exampleInputUserName">
    <h5>E-mail cím</h5>
    <input type="text" id="exampleInputEmail1"  class="form-control" placeholder="Email cím" name="uname" aria-describedby="emailHelp" required>
    <h5>Lakcím</h5><p>(Ez a mező nem kötelező. A szalonok keresésében segít.)</p>
    <input type="adress" placeholder="Lakcím" class="form-control" id="exampleInputAdress">

    <h5>Jelszó</h5>
    <input type="password" placeholder="Jelszó" class="form-control" id="exampleInputPassword1">
    <button type="submit" id="darkBrownButton" class="btn btn-secondary">Bejelentkezés</button>
</div>

@endsection
<!-- Lezárás -->
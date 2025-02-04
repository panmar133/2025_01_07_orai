@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Rólunk")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<h1>Bejelentkezés</h1>

<div id="login">
    <h5>Felhasználónév/E-mail cím</h5>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <h5>Jelszó</h5>
    <input type="password" class="form-control" id="exampleInputPassword1">

    <button type="submit" class="btn btn-primary">Bejelentkezés</button>
</div>
@endsection
<!-- Lezárás -->
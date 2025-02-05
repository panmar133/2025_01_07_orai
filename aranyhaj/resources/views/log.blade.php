@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Rólunk")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<h1>Bejelentkezés</h1>

<div id="login">
    @if(Session::has('error'))
    <form action="{{ route('login') }}" method="POST">
        <h5>E-mail cím</h5>
        <input type="email" placeholder="E-mail cím" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <h5>Jelszó</h5>
        <input type="password" placeholder="Jelszó" name="password" class="form-control" id="exampleInputPassword1" require>
        <span class="psw">Elfelejtetted a <a href="#">jelszód?</a></span>
        <button type="submit" id="darkBrownButton" class="btn btn-secondary">Bejelentkezés</button>
    </form>
</div>
@endsection
<!-- Lezárás -->
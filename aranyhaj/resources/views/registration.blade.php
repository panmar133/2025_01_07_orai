@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Rólunk")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<h2 class="d-flex justify-content-center align-items-center p-3">Regisztráció</h2>
<div class="row justify-content-center ">
        <div class="col-lg-4">
            <div class="card-header">
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Felhasználónév</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Felhasználónév" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email cím</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Pl.: aranyhaj@gmail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Lakcím</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Saját lakcímed">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Jelszó</label>
                            <input type="password" name="password" class="form-control" id="password" required placeholder="Jelszavad">
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button id="darkBrownButton" class="btn btn-primary">Regisztráció</button><br>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
<!-- Lezárás -->
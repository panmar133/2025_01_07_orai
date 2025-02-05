@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Rólunk")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<br>
<h2 class="d-flex justify-content-center align-items-center p-5">Bejelentkezés</h2>
<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="card-body">
        @if(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
        @endif
            <form action="{{ route('login') }}" method="POST">
        @csrf
            <div class="mb-2">
                <label for="email" class="form-label row justify-content-center">E-mail cím</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-2">
                <label for="password" class="form-label row justify-content-center">Jelszó</label>
                <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-2">
                <div class="d-grid mt-4"> <!-- Hozzáadtam a mt-4 osztályt a margóhoz -->
                    <button id="darkBrownButton" class="btn btn-primary">Bejelentkezés</button>
                </div>
                <div class="mt-5"></div> <!-- Extra hely hozzáadása a gomb után -->
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
<!-- Lezárás -->
@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Események")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<div class="container">
    <div class="row">
        <!-- Card kezdete -->
        <div class="card shadow-lg text-white">
            <div class="card-body text-black" id="logCards">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <!--<form action="{{ route('register') }}" method="POST"> -->
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Szalon neve</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Neve" required>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Szalon címe</label>
                        <input type="text" name="address" class="form-control" id="email" placeholder="Címe" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Szalon képre</label>
                        <input type="text" name="address" class="form-control" id="email" placeholder="Csak URL-t fogad el!" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Szalon leírása</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Max(500szó)">
                    </div><br>
                    <div class="mb-3">
                        <div class="d-grid">
                            <button id="darkBrownButton" class="btn btn-dark">Szalon létrehozása</button><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><br>

@endsection
<!-- Lezárás -->
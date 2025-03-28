@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Regisztráció")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->

<h2 class="text-center">Regisztráció</h2>
<div class="container d-flex justify-content-center">
    <div class="col-12 col-md-6 col-lg-4">
        <!-- Card kezdete -->
        <div class="card shadow-lg text-white">
            <div class="card-body text-black" id="logCards">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
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
                    <div class="form-group">
                        <label for="password">Jelszó</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                            <button id="yellowButtonEye" type="button" class="btn btn-dark">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div><br> <!-- Extra hely a gomb után -->
                    <div class="mb-5">
                        <div class="d-grid">
                            <button id="button" class="btn btn-dark">Regisztráció</button>
                        </div>
                        <a id="notRegistedProfilLink" class="text-center" href="/registration">Nincs még fiókom</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const togglePassword = document.getElementById("yellowButtonEye");
        const passwordField = document.getElementById("password");

        togglePassword.addEventListener("click", function () {
            // Toggle password field visibility
            const type = passwordField.type === "password" ? "text" : "password";
            passwordField.type = type;

            // Toggle icon (Font Awesome icons)
            const icon = togglePassword.querySelector("i");
            if (type === "password") {
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        });
    });
</script>
@endsection
<!-- Lezárás -->
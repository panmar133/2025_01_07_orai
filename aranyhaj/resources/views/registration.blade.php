@extends("layouts.layout")
@section("title", "Regisztráció")
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
                            <input type="password" id="password" class="form-control" name="password" placeholder="Jelszó">
                            <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                                <i class="fa-solid fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const togglePassword = document.getElementById("togglePassword");
                            const passwordField = document.getElementById("password");

                            togglePassword.addEventListener("click", function () {
                                // Jelszó típus váltása
                                const type = passwordField.type === "password" ? "text" : "password";
                                passwordField.type = type;

                                // Ikon változtatás
                                const icon = togglePassword.querySelector("i");
                                if (type === "password") {
                                    icon.classList.remove("bi-eye-slash");
                                    icon.classList.add("bi-eye");
                                } else {
                                    icon.classList.remove("bi-eye");
                                    icon.classList.add("bi-eye-slash");
                                }
                            });
                        });
                    </script> <br>
                    <div class="mb-3">
                        <div class="d-grid">
                            <button id="darkBrownButton" class="btn btn-primary">Regisztráció</button><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
@endsection

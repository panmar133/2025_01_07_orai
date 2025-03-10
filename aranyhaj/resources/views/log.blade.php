@extends("layouts.layout")
@section("title", "Rólunk")
@section("content")
<!-- Kontent kiszedés -->

<h2 class="text-center">Bejelentkezés</h2>
<div class="container d-flex justify-content-center">
    <div class="col-12 col-md-6 col-lg-4">
        <!-- Card kezdete -->
        <div class="card shadow-lg text-white">
            <div class="card-body text-black" id="logCards">
                @if(Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="email" class="form-label">E-mail cím</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Jelszó</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password" required>
                            <button id="yellowButtonEye" type="button" id="togglePassword" class="btn btn-outline-secondary">
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
                    </script>

                    <div class="mb-2">
                        <div class="d-grid mt-4">
                            <button id="button" class="btn btn-dark">Bejelentkezés</button>
                        </div>
                        <div class="mt-5"></div> <!-- Extra hely a gomb után -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 
<br>
@endsection

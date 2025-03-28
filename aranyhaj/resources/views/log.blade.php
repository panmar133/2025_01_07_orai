@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Bejelentkezés")
<!-- Cím adás az oldalnak változó által -->
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
                            <button id="yellowButtonEye" type="button" id="togglePassword" class="btn btn-dark">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="d-grid mt-4">
                            <button id="button" class="btn btn-dark">Bejelentkezés</button>
                        </div>
                        <a id="registedProfilLink" class="text-center" href="/registration">Nincs még fiókom</a>
                        <div class="mt-3"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><br>
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

@extends("layouts.layout")

@section("title", "Fiókom")

@section("content")
<main class="container py-5">
    @auth    
        <div class="card shadow-lg p-4">
            <div class="row g-4">
                <!-- Profilkép -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/user.png') }}" alt="Profilkép" class="img-fluid rounded-circle shadow" width="150">
                    <p class="mt-3">Profilkép módosítása</p>
                    @if(session('success'))
                        <div class="alert alert-success">
                        {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('profile.updateUrl') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control mb-2" name="profileUrlTb" placeholder="Profilkép URL" value="{{ Auth::user()->image_name }}">
                    <button type="submit" class="btn btn-dark w-100">Mentés</button>
                    </form>
                </div>

                <!-- Felhasználói adatok -->
                <div class="col-md-8">
                    <h1 class="mb-4">Fiókom</h1>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Felhasználónév:</strong> {{ Auth::user()->user_name }}</li>
                        <li class="list-group-item"><strong>Admin:</strong> {{ Auth::user()->is_admin ? 'Igen' : 'Nem' }}</li>
                        <li class="list-group-item"><strong>Email cím:</strong> {{ Auth::user()->email }}</li>
                        <li class="list-group-item"><strong>Lakcím:</strong> {{ Auth::user()->address }}</li>
                    </ul>
                    
                    <!-- Módosítási gombok -->
                    <div class="mt-4">
                        <!-- Email cím módosítása gomb -->
                        <form action="{{ route('email.change') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="text" class="form-control mb-2" name="profileEmail" placeholder="Email cím" value="{{ Auth::user()->email }}">
                            <button type="submit" class="btn btn-dark w-100">Mentés</button>
                        </form>

                        <!-- Jelszó módosítása gomb -->
                        <form action="{{ route('password.change') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="password" class="form-control" id="currentPassword" name="current_password" placeholder="Jelenlegi jelszó" required>
                            <input type="password" class="form-control" name="password" placeholder="Új jelszó" required>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Új jelszó megerősítése" required>
                            <button type="submit" class="btn btn-dark w-100">Jelszó módosítás</button>
                        </form>

                        <!-- Lakcím módosítása gomb -->
                        <form action="{{ route('address.change') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="text" class="form-control mb-2" name="profileAddress" placeholder="Lakcím" value="{{ Auth::user()->address }}">
                            <button type="submit" class="btn btn-dark w-100">Mentés</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Ha nincs bejelentkezve -->
        <div class="text-center">
            <h2>Bejelentkezés szükséges</h2>
            <a href="{{ route('login') }}" class="btn btn-primary">Bejelentkezés</a>
        </div>
    @endauth
</main>
@endsection

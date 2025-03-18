@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Fiókom")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main class="container py-5">
    @auth    
        <div class="card shadow-lg p-4">
            <div class="row g-4">
                <!-- Profilkép -->
                <div class="col-md-4 text-center">
                    <img src="{{ Auth::user()->image_name }}" alt="Profilkép" class="img-fluid rounded-circle shadow" width="150">
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
                    <button id="button" type="submit" class="btn btn-dark w-100">Mentés</button>
                    </form>
                </div>

                <!-- Felhasználói adatok -->
                <div class="col-md-8">
                    <h1 class="mb-4">Fiókom</h1>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Felhasználónév:</strong> {{ Auth::user()->user_name }}</li>
                        <li class="list-group-item"><strong>Jogosultság:</strong>
                                @if(Auth::user()->admin == 1)
                                    Szalontulajdonos
                                    @if(Auth::user()->salons->isNotEmpty())
                                        - Szalon neve: {{ Auth::user()->salons->first()->salon_name }}
                                    @else
                                        - Nincs szalonhoz rendelve
                                    @endif
                                @elseif(Auth::user()->admin == 2)
                                    Admin
                                @elseif(Auth::user()->admin == 0)
                                    Felhasználó
                                @else
                                    Hibás adat: {{ Auth::user()->admin }}
                                @endif
                            </li>

                        <li class="list-group-item"><strong>Email cím:</strong> {{ Auth::user()->email }}</li>
                        <li class="list-group-item"><strong>Lakcím:</strong> {{ Auth::user()->address }}</li>
                    </ul>
                    
                    <!-- Módosítási rész -->
                    <div class="mt-4">
                        <!-- email módosítás -->
                        <form action="{{ route('email.change') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="text" class="form-control mb-2" name="profileEmail" placeholder="Email cím" value="{{ Auth::user()->email }}">
                            <button id="button" type="submit" class="btn btn-dark w-100">Mentés</button>
                        </form>

                        <!-- jelszó módosítás -->
                        <form action="{{ route('password.change') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="password" class="form-control" id="currentPassword" name="current_password" placeholder="Jelenlegi jelszó" required>
                            <input type="password" class="form-control" name="password" placeholder="Új jelszó" required>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Új jelszó megerősítése" required>
                            <button id="button" type="submit" class="btn btn-dark w-100">Jelszó módosítás</button>
                        </form>

                        <!-- lakcím módosítás -->
                        <form action="{{ route('address.change') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="text" class="form-control mb-2" name="profileAddress" placeholder="Lakcím" value="{{ Auth::user()->address }}">
                            <button id="button" type="submit" class="btn btn-dark w-100">Mentés</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Nem bejelentkezett felhasználók kezelése -->
        <div class="text-center">
            <h2>Bejelentkezés szükséges</h2>
            <a id="button" href="{{ route('login') }}" class="btn btn-dark">Bejelentkezés</a>
        </div>
    @endauth
</main>

@endsection
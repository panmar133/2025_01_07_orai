@extends('layouts.layout')

@section('content')
    <div class="container mt-5">

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Új Szalon létrehozása</h5>
                <a href="{{ route('admin.dashboard') }}" id="yellowButton" class="btn btn-light">Mégsem</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.createSalon') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="salon_name" class="form-label">Szalon neve</label>
                        <input type="text" name="salon_name" id="salon_name" class="form-control" value="{{ old('salon_name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="short_information" class="form-label">Rövid információ</label>
                        <input type="text" name="short_information" id="short_information" class="form-control" value="{{ old('short_information') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="information" class="form-label">Részletes információ</label>
                        <textarea name="information" id="information" class="form-control" rows="4" required>{{ old('information') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Helyszín</label>
                        <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="owner_id" class="form-label">Tulajdonos</label>
                        <select name="owner_id" id="owner_id" class="form-control" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image_name" class="form-label">Kép URL</label>
                        <input type="text" name="image_name" id="image_name" class="form-control" value="{{ old('image_name') }}">
                    </div>

                    <button type="submit" id="button" class="btn btn-dark mt-3 w-100">Szalon létrehozása</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('{{ route('admin.createSalon') }}').addEventListener('submit', function(event) {
            let valid = true;

            // Helyszín ellenőrzés (tartalmazza-e "út" vagy "utca" szót)
            let locationInput = document.getElementById('location');
            let locationError = document.getElementById('locationError');
            if (!locationInput.value.match(/\b(út|utca)\b/i)) {
                locationError.classList.remove('d-none');
                valid = false;
            } else {
                locationError.classList.add('d-none');
            }

            // URL ellenőrzés (https:// -sel kezdődik-e)
            let urlInput = document.getElementById('image_name');
            let urlError = document.getElementById('urlError');
            if (urlInput.value && !urlInput.value.match(/^https:\/\//)) {
                urlError.classList.remove('d-none');
                valid = false;
            } else {
                urlError.classList.add('d-none');
            }

            if (!valid) {
                event.preventDefault(); // Űrlap küldésének megakadályozása
            }
        });
    </script>
@endsection

@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Új Esemény létrehozása</h5>
                <a href="{{ route('admin.dashboard') }}" id="yellowButton" class="btn btn-light">Mégsem</a>
            </div>
            <div class="card-body">
                <form id="eventForm" action="{{ route('admin.createEvent') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Esemény neve</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Helyszín</label>
                        <input type="text" name="location" id="location" class="form-control" required>
                        <small id="locationError" class="text-danger d-none">A helyszínnek tartalmaznia kell az "út" vagy "utca" szót.</small>
                    </div>

                    <div class="mb-3">
                        <label for="short_information" class="form-label">Rövid információ</label>
                        <input type="text" name="short_information" id="short_information" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="information" class="form-label">Részletes információ</label>
                        <textarea name="information" id="information" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="starts_at" class="form-label">Kezdési időpont</label>
                        <input type="datetime-local" name="starts_at" id="starts_at" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="image_name" class="form-label">Kép URL</label>
                        <input type="text" name="image_name" id="image_name" class="form-control">
                        <small id="urlError" class="text-danger d-none">Az URL-nek "https://" kezdetűnek kell lennie.</small>
                    </div>

                    <button type="submit" class="btn btn-dark mt-3 w-100">Esemény Létrehozása</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('eventForm').addEventListener('submit', function(event) {
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

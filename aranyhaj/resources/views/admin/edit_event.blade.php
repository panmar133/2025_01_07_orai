@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Esemény szerkesztése: {{ $event->title }}</h3>
                <a href="{{ route('admin.dashboard') }}" id="yellowButton" class="btn btn-light">Mégsem</a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.updateEvent', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Esemény neve</label>
                        <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Helyszín</label>
                        <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="short_information" class="form-label">Rövid információ</label>
                        <input type="text" name="short_information" class="form-control" value="{{ $event->short_information }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="information" class="form-label">Részletes információ</label>
                        <textarea name="information" class="form-control" rows="4" required>{{ $event->information }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image_name" class="form-label">Kép URL</label>
                        <input type="text" name="image_name" class="form-control" value="{{ $event->image_name }}">
                    </div>

                    <div class="mb-3">
                        <label for="starts_at" class="form-label">Kezdés időpontja</label>
                        <input type="datetime-local" name="starts_at" class="form-control" value="{{ old('starts_at', \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <button type="submit" id="button" class="btn btn-dark mt-3">Mentés</button>
                </form>
            </div>
        </div>

        <div class="card shadow-sm mt-4">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">Esemény törlése</h5>
            </div>
            <div class="card-body text-center">
                <p class="text-dark">A törlés véglegesen eltávolítja az eseményt. Ha biztos benne, kattintson a gombra.</p>
                <form action="{{ route('admin.deleteEvent', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="button" class="btn btn-dark">Esemény törlése</button>
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

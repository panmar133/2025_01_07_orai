@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            @csrf
            @method('PUT')
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Szalon szerkesztése: {{ $salon->salon_name }}</h3>
                    <a href="{{ route('admin.dashboard') }}" id="yellowButton" class="btn btn-light">Mégsem</a>
                </div>
                <div class="card-body">
                <form id="salonForm" action="{{ route('admin.updateSalon', $salon->id) }}" method="POST">

                    <div class="mb-3">
                        <label for="salon_name" class="form-label">Szalon neve</label>
                        <input type="text" name="salon_name" class="form-control" value="{{ old('salon_name', $salon->salon_name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Helyszín</label>
                        <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $salon->location) }}" required>
                        <small id="locationError" class="text-danger d-none">A helyszínnek tartalmaznia kell az "út" vagy "utca" szót.</small>
                    </div>

                    <div class="mb-3">
                        <label for="short_information" class="form-label">Rövid információ</label>
                        <input type="text" name="short_information" class="form-control" value="{{ old('short_information', $salon->short_information) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="information" class="form-label">Bővebb információ</label>
                        <textarea name="information" class="form-control" rows="4" required>{{ old('information', $salon->information) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image_name" class="form-label">Kép URL</label>
                        <input type="text" name="image_name" id="image_name" class="form-control" value="{{ old('image_name', $salon->image_name) }}">
                        <small id="urlError" class="text-danger d-none">Az URL-nek "https://" -sel kell kezdődnie.</small>
                    </div>

                    <button id="button" type="submit" class="btn btn-dark mt-3">Szalon frissítése</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('salonForm').addEventListener('submit', function(event) {
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

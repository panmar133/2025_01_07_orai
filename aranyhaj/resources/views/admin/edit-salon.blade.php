@extends('layouts.layout')

@section('content')
    <div class="container">
        <h2>Szalon kezelése: {{ $salon->salon_name }}</h2>

        <form action="{{ route('admin.updateSalon', $salon->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="salon_name" class="form-label">Szalon neve</label>
                <input type="text" name="salon_name" class="form-control" value="{{ old('salon_name', $salon->salon_name) }}" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Helyszín</label>
                <input type="text" name="location" class="form-control" value="{{ old('location', $salon->location) }}" required>
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
                <input type="text" name="image_name" class="form-control" value="{{ old('image_name', $salon->image_name) }}">
            </div>

            <button type="submit" class="btn btn-dark">Szalon frissítése</button>
        </form>

        <form action="{{ route('admin.deleteSalon', $salon->id) }}" method="POST" class="mt-3">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Szalon törlése</button>
        </form>
    </div>
@endsection
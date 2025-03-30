@extends('layouts.layout')

@section('content')
    <div class="container">
        <h1>Új szalon létrehozása</h1>

        <form action="{{ route('admin.createSalon') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="salon_name">Szalon neve</label>
                <input type="text" name="salon_name" id="salon_name" class="form-control" value="{{ old('salon_name') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="short_information">Rövid információ</label>
                <input type="text" name="short_information" id="short_information" class="form-control" value="{{ old('short_information') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="information">Részletes információ</label>
                <textarea name="information" id="information" class="form-control" required>{{ old('information') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="location">Helyszín</label>
                <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="owner_id">Tulajdonos</label>
                <select name="owner_id" id="owner_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->user_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="image_name">Kép URL</label>
                <input type="text" name="image_name" id="image_name" class="form-control" value="{{ old('image_name') }}">
            </div>

            <button type="submit" id="button" class="btn btn-dark mt-2">Szalon létrehozása</button>
        </form>
    </div>
@endsection
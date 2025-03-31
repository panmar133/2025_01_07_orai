@extends('layouts.layout')
@section("title", "Új esemény létrehozása")
@section('content')
<div class="container">
    <h2>Új Esemény Létrehozása</h2>
    <form action="{{ route('owner.createEvent') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Esemény neve</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Helyszín</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="short_information">Rövid információ</label>
            <input type="text" name="short_information" id="short_information" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="information">Részletes információ</label>
            <textarea name="information" id="information" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="starts_at">Kezdési időpont</label>
            <input type="datetime-local" name="starts_at" id="starts_at" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="image_name">Kép URL</label>
            <input type="text" name="image_name" id="image_name" class="form-control">
        </div>

        <!-- Szalon kiválasztása -->
        <div class="form-group">
            <label for="salon_id">Válassza ki a szalont</label>
            <select name="salon_id" id="salon_id" class="form-control" required>
                <option value="">Válasszon egy szalont</option>
                @foreach ($salons as $salon)
                    <option value="{{ $salon->id }}">{{ $salon->salon_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" id="button" class="btn btn-dark mt-3">Esemény Létrehozása</button>
    </form>
</div>
@endsection
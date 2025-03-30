@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Új Esemény Létrehozása</h2>
    <form action="{{ route('admin.createEvent') }}" method="POST">
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

        <button type="submit" class="btn btn-primary mt-3">Esemény Létrehozása</button>
    </form>
</div>
@endsection
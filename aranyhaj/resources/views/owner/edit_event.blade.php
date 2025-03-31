@extends('layouts.layout')
@section("title", "Esemény módosítása")
@section('content')
<div class="container">
    <h2>Esemény módosítása</h2>

    <form action="{{ route('owner.updateEvent', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Esemény neve</label>
            <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
        </div>

        <div class="form-group">
            <label for="location">Helyszín</label>
            <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
        </div>

        <div class="form-group">
            <label for="short_information">Rövid információ</label>
            <input type="text" name="short_information" class="form-control" value="{{ $event->short_information }}" required>
        </div>

        <div class="form-group">
            <label for="information">Részletes információ</label>
            <textarea name="information" class="form-control" required>{{ $event->information }}</textarea>
        </div>

        <div class="form-group">
            <label for="image_name">Kép URL</label>
            <input type="text" name="image_name" class="form-control" value="{{ $event->image_name }}">
        </div>

        <div class="form-group">
            <label for="starts_at">Kezdés időpontja</label>
            <input type="datetime-local" name="starts_at" class="form-control" value="{{ old('starts_at', \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <button type="submit" id="button" class="btn btn-dark mt-3">Mentés</button>
    </form>

    <form action="{{ route('owner.deleteEvent', $event->id) }}" method="POST" class="mt-3">
        @csrf
        @method('DELETE')
        <button type="submit" id="button" class="btn btn-dark mt-3">Esemény törlése</button>
    </form>
</div>
@endsection
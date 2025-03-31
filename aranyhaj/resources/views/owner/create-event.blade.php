@extends('layouts.layout')

@section("title", "Új esemény létrehozása")

@section('content')
    <div class="container mt-5">
        <div class="card border rounded shadow-sm">
            <!-- Fejléc a kártya tetején -->
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Új Esemény Létrehozása</h2>
                <div class="d-flex">
                    <a href="{{ route('owner.dashboard') }}" class="btn btn-light me-2">Mégsem</a>
                    <form action="{{ route('owner.createEvent') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-dark">Esemény létrehozása</button>
                    </form>
                </div>
            </div>

            <!-- Tartalom -->
            <div class="card-body p-4">
                <form action="{{ route('owner.createEvent') }}" method="POST">
                    @csrf

                    <!-- Esemény Neve -->
                    <div class="form-group mb-3">
                        <label for="title">Esemény neve</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <!-- Helyszín -->
                    <div class="form-group mb-3">
                        <label for="location">Helyszín</label>
                        <input type="text" name="location" id="location" class="form-control" required>
                    </div>

                    <!-- Rövid információ -->
                    <div class="form-group mb-3">
                        <label for="short_information">Rövid információ</label>
                        <input type="text" name="short_information" id="short_information" class="form-control" required>
                    </div>

                    <!-- Részletes információ -->
                    <div class="form-group mb-3">
                        <label for="information">Részletes információ</label>
                        <textarea name="information" id="information" class="form-control" required></textarea>
                    </div>

                    <!-- Kezdési időpont -->
                    <div class="form-group mb-3">
                        <label for="starts_at">Kezdési időpont</label>
                        <input type="datetime-local" name="starts_at" id="starts_at" class="form-control" required>
                    </div>

                    <!-- Kép URL -->
                    <div class="form-group mb-3">
                        <label for="image_name">Kép URL</label>
                        <input type="text" name="image_name" id="image_name" class="form-control">
                    </div>

                    <!-- Szalon kiválasztása -->
                    <div class="form-group mb-3">
                        <label for="salon_id">Válassza ki a szalont</label>
                        <select name="salon_id" id="salon_id" class="form-control" required>
                            <option value="">Válasszon egy szalont</option>
                            @foreach ($salons as $salon)
                                <option value="{{ $salon->id }}">{{ $salon->salon_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark mt-3 w-100">Esemény Létrehozása</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Adományozok")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset($event->image_name) }}" alt="Event Image" class="img-fluid">
                        <h1 class="text-center mb-4">{{ $event->title }}</h1><hr><br>
                        <div class="event-details">
                        <div class="col-12 mb-3 text-">
                            <p><strong>Közzétéve:</strong> {{ \Carbon\Carbon::parse($event->posted_time)->format('Y-m-d H:i') }}</p>
                        </div>
                        <div class="col-12 mb-3">
                            <p><strong>Esemény kezdete:</strong> {{ \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d H:i') }}</p>
                        </div>
                        <p><strong>Location:</strong> {{ $event->location }}</p>
                        <p><strong>Likeok száma:</strong> {{ $event->likes_count ?? 0 }}</p>
                        <p><strong>Résztvevők száma:</strong> {{ $event->participants_count ?? 0 }}</p>
                        <p>{{ $event->information }}</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><br>
<!-- Lezárás -->
@endsection


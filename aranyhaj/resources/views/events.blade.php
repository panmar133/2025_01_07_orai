@extends("layouts.layoutSearch")
<!-- Fejléc kiszedés -->
@section("title", "Események")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
    <h1 id="eventTitle" class="text-center">Események</h1>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif
        <div class="row">
            @foreach ($events as $event)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body" id="eventCards">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title">{{ $event->title }}</h5>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="mb-0"><strong>Esemény kezdete:</strong> {{ \Carbon\Carbon::parse($event->starts_at)->format('Y/m/d H:i') }}órakor</p>
                                </div>
                            </div>
                            <img id="image" src="{{ asset($event->image_name) }}" alt="Event Image" class="img-fluid my-3" style="width: 370px; height: auto;">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-dark">Továbbiak</a>
                                <p class="card-text mb-0 ms-3">
                                    <strong>Résztvevők száma:</strong>
                                    <a href="">{{ $event->participants_count ?? 0 }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer text-center" id="eventFooter">
                            <form action="{{ route('event.like') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="btn btn-brown me-2">{{ $event->likes_count ?? 0 }} 👍</button>
                            </form>

                            <form action="{{ route('event.participate') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="btn btn-secondary">Részt veszek</button>
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main><br>
@endsection
<!-- Lezárás -->
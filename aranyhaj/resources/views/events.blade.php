@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Események")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
    <h1>Események</h1>
    <p></p>     <!-- rövid leírás -->
<script>
$(document).ready(function() {
    $(".btn-like").click(function() {
        var eventId = $(this).data("event-id");
        $.ajax({
            url: "/like-event",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                event_id: eventId
            },
            success: function(response) {
                alert(response.message);
            }
        });
    });

    $(".btn-participate").click(function() {
        var eventId = $(this).data("event-id");
        $.ajax({
            url: "/participate-event",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                event_id: eventId
            },
            success: function(response) {
                alert(response.message);
            }
        });
    });
});
</script>
    <!-- PHP-s kilistázás -->
    <div class="container">
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
                                    <p class="mb-1"><strong>Feltevési idő:</strong> {{ $event->posted_time }}</p>
                                    <p class="mb-0"><strong>Esemény kezdése:</strong> {{ $event->starts_at }}</p>
                                </div>
                            </div>

                            <img src="{{ asset('images/' . $event->image_name) }}" alt="Event Image" class="img-fluid my-3">

                            <p class="card-text">{{ $event->information }}</p>
                            <p class="card-text">
                                <strong>Location:</strong>
                                <a href="">{{ $event->location }}</a>
                            </p>
                        </div>

                        <div class="card-footer text-center" id="eventFooter">
                            <button class="btn btn-brown me-2" data-event-id="{{ $event->id }}">👍</button>
                            <button id="darkBrownButton" class="btn btn-secondary" data-event-id="{{ $event->id }}">Részt veszek</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



        </table>
    </div>  
</main>
@endsection
<!-- Lezárás -->
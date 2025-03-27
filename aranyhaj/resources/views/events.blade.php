@extends("layouts.layout")
@section("title", "Események")
@section("content")
<main>
    <h1 id="eventTitle" class="text-center">Események</h1>
    <div class="search-container text-center">
        <input type="text" id="search" class="form-control" placeholder="Keresés esemény név vagy helyszín alapján...">
    </div>
    <div class="container">
        <div class="row">
            @foreach ($events as $event)
                <div class="col-12 col-md-6 col-lg-4 mb-4  event-card">
                    <div class="card h-100 shadow">
                        <div class="card-body d-flex flex-column">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title text-center">{{ $event->title }}</h5>
                                </div>
                                <div class="col-6 text-end">
                                <p class="mb-0">
                                    <strong>Időpont:</strong> 
                                    <span class="date">{{ \Carbon\Carbon::parse($event->starts_at)->format('Y-m-d') }}</span> 
                                    <span class="time">{{ \Carbon\Carbon::parse($event->starts_at)->format('H:i') }}</span>
                                </p>


                                </div>
                            </div>

                            <img id="postImage" src="{{ asset($event->image_name) }}" alt="Event Image" class="img-fluid rounded my-3">

                            <p class="text-center">{{ $event->short_information }}</p>
                            <div class="col-md-8 mb-1">
                                <p><strong>Helyszín:</strong>
                                    <a id="copyLink" class="copy-text tooltip-trigger" onclick="copyText(this)" 
                                    data-location="{{ $event->location }}">
                                        {{ Str::limit($event->location, 30, '...') }}
                                    </a>
                                </p>   
                            </div>


                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-dark btn-hover">Továbbiak</a>
                                <p class="card-text mb-0 ms-3">
                                    <strong>Résztvevők:</strong>
                                    <a href="" class="participants-count" data-event-id="{{ $event->id }}">{{ $event->participants_count ?? 0 }}</a>
                                </p>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <!-- Like gomb -->
                            <form action="{{ route('event.like') }}" method="POST" class="like-form">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="btn btn-brown like-btn">{{ $event->likes_count ?? 0 }} 👍</button>
                            </form>

                            <!-- Résztvétel gomb -->
                            <form action="{{ route('event.participate') }}" method="POST" class="participate-form">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit" class="btn btn-warning participate-btn">Részt veszek</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main><br>

<script>
    // Kereső mező eseményekhez
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("search");
        const cards = document.querySelectorAll(".event-card");
        const noResultsDiv = document.getElementById("no-results");

        function filterEvents() {
            const searchText = searchInput.value.toLowerCase();
            let hasResults = false;

            cards.forEach(card => {
                const eventName = card.querySelector(".card-title").textContent.toLowerCase();
                const eventLocation = card.querySelector(".copy-text").textContent.toLowerCase();

                const matchesSearch = eventName.includes(searchText) || eventLocation.includes(searchText);
                card.style.display = matchesSearch ? "block" : "none";

                if (matchesSearch) {
                    hasResults = true;
                }
            });

            noResultsDiv.style.display = hasResults ? "none" : "block";
        }

        searchInput.addEventListener("input", filterEvents);
    });

    function copyText(element) {
        const location = element.getAttribute('data-location');
        navigator.clipboard.writeText(location)
            .then(() => alert('Lemmentetted ezt a helyszínt: ' + location))
            .catch(error => alert('Nem sikerült lementened: ' + error));
    }

</script>
@endsection

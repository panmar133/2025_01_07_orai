@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Szalonok")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->

<main>
    <h1 id="eventTitle" class="text-center">Szalonok</h1>
    <div class="search-container text-center">
            <input type="text" id="search" class="form-control" placeholder="Keresés szalon név vagy város alapján..."><br>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($salons as $salon)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column" id="eventCards">
                            <h5 class="card-title">{{ $salon->salon_name }}</h5>
                            <img id="image" src="{{ $salon->image_name }}" alt="Szalon Kép" class="img-fluid my-3">
                            <p class="card-text">{{ $salon->information }}</p>
                            <a id="button" href="{{ route('salons.show', $salon->id) }}" class="btn btn-dark">Továbbiak</a>
                            <div class="mt-auto">
                                <p class="card-text">
                                    <strong>Szalon helye:</strong>
                                    <a id="copyLink" class="copy-text" onclick="copyText(this)" 
                                        data-location="{{ $salon->location }}">
                                        {{ $salon->location }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="no-results" style="display: none; text-align: center;">
        Nincs ilyen találat.
    </div>

    <script> 
    //Kereső mező
    document.addEventListener("DOMContentLoaded", function () { 
        const searchInput = document.getElementById("search");
        const cards = document.querySelectorAll(".col-12");
        const noResultsDiv = document.getElementById("no-results");

        function filterSalons() {
            const searchText = searchInput.value.toLowerCase();
            let hasResults = false;

            cards.forEach(card => {
                const salonName = card.querySelector(".card-title").textContent.toLowerCase();
                const salonLocation = card.querySelector(".copy-text").textContent.toLowerCase();

                const matchesSearch = salonName.includes(searchText) || salonLocation.includes(searchText);
                card.style.display = matchesSearch ? "block" : "none";

                if (matchesSearch) {
                    hasResults = true;
                }
            });

            // Ha nincs találat, mutassuk az üzenetet, különben rejtsük el
            noResultsDiv.style.display = hasResults ? "none" : "block";
        }

        searchInput.addEventListener("input", filterSalons);
    });

        //Cím másolása
        function copyText(element) {
            const location = element.getAttribute('data-location');
            // URL kódolás JavaScript-ben
            const cim = 'https://www.google.com/maps?q=' + encodeURIComponent(location);

            navigator.clipboard.writeText(cim)
                .then(() => alert('Lemmentetted ezt a helyszínt: ' + cim))
                .catch(error => alert('Nem sikerült lementened: ' + error));
        }

    </script>
</main><br>

<div class="text d-flex justify-content-center">
    <a id="button" href="/adminSalon" class="btn btn-dark col-lg-3 text-center">Szalon hozzáadása</a>
</div><br>

@endsection
<!-- Lezárás -->
@extends("layouts.layoutSearch")

@section("title", "Szalonok")

@section("content")
<main>
    <h1 id="eventTitle" class="text-center">Szalonok</h1>
    <div class="container">
        <div class="row">
            @foreach ($salons as $salon)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column" id="eventCards">
                            <h5 class="card-title">{{ $salon->salon_name }}</h5>
                            <img id="image" src="{{ asset($salon->image_name) }}" alt="Szalon Kép" class="img-fluid my-3">
                            <p class="card-text">{{ $salon->information }}</p>
                            <a id="button" href="{{ route('salons.show', $salon->id) }}" class="btn btn-dark">Továbbiak</a>
                            <div class="mt-auto">
                                <p class="card-text">
                                    <strong>Szalon helye:</strong>
                                    <a class="copy-text" onclick="copyText(this)" 
                                        data-city="{{ $salon->city }}" data-street="{{ $salon->street }}" data-zip-code="{{ $salon->zip_code }}">
                                        {{ $salon->city }} {{ $salon->street }} {{ $salon->zip_code }}
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        function copyText(element) {
            const city = element.getAttribute('data-city');
            const street = element.getAttribute('data-street');
            const zipCode = element.getAttribute('data-zip-code');
            const textToCopy = city + ' ' + street + ' ' + zipCode;

            navigator.clipboard.writeText(textToCopy)
                .then(() => alert('Lemmentetted ezt a helyszínt: ' + city + ' ' + street + ' ' + zipCode))
                .catch(error => alert('Nem sikerült lementened: ' + error));
        }
    </script>
</main><br>
<div class="text d-flex justify-content-center">
    <a id="button" href="/adminSalon" class="btn btn-dark col-lg-3 text-center">Szalon hozzáadása</a>
</div><br>
@endsection

@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Adományozok")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->

<main id="salon-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card salon-card">
                    <div class="card-body">
                        <div class="salon-header text-center">
                            <img src="{{ asset($salon->image_name) }}" class="salon-image img-fluid" alt="Szalon kép">
                            <h1 class="salon-title">{{ $salon->salon_name }}</h1>
                            <hr class="salon-separator">
                        </div>

                        <div class="salon-info text-center">
                            <p><strong>Szalon helye:</strong>
                                <a class="copy-text" onclick="copyText(this)" id="copyLink" data-city="{{ $salon->city }}" 
                                    data-street="{{ $salon->street }}" data-zip-code="{{ $salon->zip_code }}">
                                    {{ $salon->city }} {{ $salon->street }} {{ $salon->zip_code }}
                                </a>
                            </p>
                            <p><strong>Rövid leírás:</strong> {{ $salon->short_information }}</p>
                            <p><strong>Információ:</strong> {{ $salon->information }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><br>
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
<!-- Lezárás -->
@endsection
@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Szalonok")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<main>
    <h1>Szalonok</h1>
    <p></p>     <!-- rövid leírás -->
    

<!-- PHP-s kilistázás --> 


<div class="container">
    <div class="row">
        @foreach ($salons as $salon)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column" id="eventCards">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title">{{ $salon->salon_name }}</h5>
                            </div>
                            <div class="col-6 text-end">
                                <p class="mb-1"><strong>Szalon tulajdonosa: </strong> {{$salon->owner->user_name ?? 'N/A'}}</p>
                            </div>
                        </div>

                        <img id="image" src="{{ asset('images/'. $salon->image_name) }}" alt="Szalon Kép" class="img-fluid my-3">

                        <p class="card-text">{{ $salon->information }}</p>

                        <div class="mt-auto">
                            <p class="card-text">
                                <strong>Location:</strong>
                                <a class="copy-text" onclick="copyText()">{{ $salon->city }} {{ $salon->street }} {{ $salon->zip_code }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
        function copyText() {
            // Select the text inside the paragraph
            const textToCopy = document.querySelector('.copy-text').innerText;

            // Use the Clipboard API to copy the text to the clipboard
            navigator.clipboard.writeText(textToCopy)
                .then(function() {
                    alert('Text copied to clipboard!');
                })
                .catch(function(error) {
                    alert('Failed to copy text: ' + error);
                });
        }
</script>
</main>

@endsection
<!-- Lezárás -->
@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Rólunk")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
<h1>Rólunk</h1>
<main>
    <div id="smallBox">
        <img src="{{ asset('images/small.jpg') }}" alt="Kis kép">
        <h3>Rólunk</h3>
        <p><!-- Ismertető szöveg rólunk --></p>
    </div>

    <div class="gallery">
        <div class="slides">
            <img src="{{ asset('images/image1.jpg') }}" alt="Image 1">
            <img src="{{ asset('images/image2.jpg') }}" alt="Image 2">
            <img src="{{ asset('images/image3.jpg') }}" alt="Image 3">
        </div>
        <!-- Balra és jobbra navigáló gombok -->
        <button id="prev">&lt;</button>
        <button id="next">&gt;</button>
    </div>

</main>
@endsection
<!-- Lezárás -->
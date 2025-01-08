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
        <h3>Rólunk/h3>
        <p><!-- Ismertető szöveg rólunk --></p>
    </div>

    <!-- Nyíilakkal mozdítható galléria -->
    <div id="Gallery">
        <div class="movingGallery">
            <!-- PHP-s fügvény leírása minimálisan, máshol hajtodik végre -->
            @foreach ($images as $image)
                <img src="{{ asset('images/' . $image) }}" alt="Galéria kép">

            @endforeach
        </div>
        <!-- post funkció meghívása -->
        <form method="post" action="{{ route('gallery.navigate') }}">
            @csrf                 <!-- IDK WIF? -->
            <button type="submit" name="direction" value="prev" class="button">&lt;</button><!-- Gombok Lacikám -->
            <button type="submit" name="direction" value="next" class="button">&gt;</button><!-- Gombok -->
        </form>
    </div>
</main>
@endsection
<!-- Lezárás -->
@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Üdvözlünk!")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->

<main>
    <!-- Felül kép fölött lévő állomás -->
    <div id="firstContentMainPage">
        <h1><a href="/">Aranyhaj</a></h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Ratione, tenetur quis. Ut, quia, illo, velit expedita
            blanditiis laudantium natus exercitationem corrupti ad
            tempore consequatur odio explicabo quas. Dolore, veniam tempora!</p><!-- Kéne egy jobb szöveg ;) -->
        <button>Adományozok</button>
    </div><br>

    <!-- Gombok az oldalak között. Kinézete: mint a krétán a bejelentkezés eleje ???leírás??? -->
    <div id="SecoundContentMainPage">
        <div>
            <img src="" alt="event">
            <button><a href="/events">Események</a></button>
        </div>
        <div>
            <img src="" alt="donation">
            <button><a href="/donate">Adományozok</a></button>
        </div>
        <div>
            <img src="" alt="salon">
            <button><a href="/salons">Szalonok</a></button>
        </div>
    </div>

    <!-- Dinamikus elemek?->Események -->
</main>
@endsection
<!-- Lezárás -->
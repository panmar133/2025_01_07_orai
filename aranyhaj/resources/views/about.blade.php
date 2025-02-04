@extends("layouts.layout")
<!-- Fejléc kiszedés -->
@section("title", "Üdvözlünk!")
<!-- Cím adás az oldalnak változó által -->
@section("content")
<!-- Kontent kiszedés -->
    <h1>Rólunk</h1>
        <main>
            <div id="smallBox">
                <img src="{{ asset('images/small.jpg') }}" alt="Kis kép">
                <h3>Rólunk</h3>
                <p>Üdvözlünk az oldalunkon! </p>
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
        
            <div id="aboutText">
                <p>Mi, azért hoztuk létre ezt az oldalt, mert hiszünk abban, hogy közösen nagy dolgokat
                    érhetünk el. Az adománygyűjtés számunkra nemcsak egy lehetőség, hanem egy küldetés,
                    amely segít jobbá tenni a világot. </p> <br>
        
                <p>Az évek során számos kezdeményezésben vettünk részt, és most szeretnénk egy olyan
                    közösséget építeni, ahol mindenki hozzájárulhat egy nemes cél eléréséhez. Hiszünk
                    az összefogás erejében, és abban, hogy együtt valódi változást hozhatunk létre.</p><br>
        
                <p>🔥<b> Amiért itt vagyunk </b> Hiszünk abban, hogy minden apró gesztus számít.
                    Célunk egy támogató közösség létrehozása, ahol mindenki hozzájárulhat egy közös,
                    nemes cél eléréséhez. Együtt nagy dolgokra vagyunk képesek! </p><br>
        
                <p>💡<b> Hogyan segíthetsz? </b></p>
                <ul>
                    <li>Oszd meg a történetünket</li>
                    <li>Csatlakozz hozzánk</li>
                    <li>Adományoz bármilyen formában</li>
                    <li>Támogasd kezdeményezésünket</li>
                </ul>
                <p>📩 <b>Lépj velünk kapcsolatba,</b> Ha szeretnél többet megtudni rólunk vagy támogatni a munkánkat,
                    ne habozz írni nekünk! </p>
            </div>
    </main>  
@endsection
<!-- Lezárás -->